<?php

namespace Guzzle\Aws\ProductAdvertising\Command;

use Guzzle\Service\Command\AbstractCommand;
use Guzzle\Http\Message\RequestInterface;
use Guzzle\Common\XmlElement;

/**
 * Abstract base command, all commands inherit from this class
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
abstract class AbstractProductAdvertisingCommand extends AbstractCommand
{
    /**
     * @var string web service operation name
     */
    protected $operation;
    
    /**
     * @var string HTTP request method
     */
    protected $requestMethod = RequestInterface::GET;
    
    /**
     * Build HTTP request
     */
    protected function build()
    {
        if (!$this->operation) {
            // @codeCoverageIgnoreStart
            throw new \RuntimeException('You must define an operation name');
            // @codeCoverageIgnoreEnd
        }
        
        if (!$this->request) {
            $this->request = $this->client->createRequest($this->requestMethod);
        }
        
        // Set authorization fields
        $config = $this->getClient()->getConfig();
        $this->request->getQuery()
            ->set('AWSAccessKeyId', $config['access_key']);
        
        // Add operation and associate tag to request
        $this->request->getQuery()
            ->set('Operation', $this->operation)
            ->set('AssociateTag', $config['associate_tag']);
        
        // Add parameters to request
        foreach($this->data as $param => $value) {
            if ($param == 'headers') {
                continue;
            }
            if (is_bool($value)) {
                $this->request->getQuery()->set($param, $value ? 'True' : 'False');
            } else if (is_array($value)) {
                $this->request->getQuery()->set($param, implode(',', $value));
            } else {
                $this->request->getQuery()->set($param, $value);
            }
        }
    }
    
    /**
     * Process response
     */
    protected function process()
    {
        if (strpos($this->getResponse()->getBody(true), '<?xml') !== false) {
            $body = $this->getResponse()->getBody(true);
            $body = preg_replace('# xmlns=[^ >]*#', '', $body);
            $this->result = new XmlElement($body);
        }
    }
}