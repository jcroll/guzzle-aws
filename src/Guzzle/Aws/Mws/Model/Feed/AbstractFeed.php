<?php

/**
 * @package Guzzle PHP <http://www.guzzlephp.org>
 * @license See the LICENSE file that was distributed with this source code.
 */

namespace Guzzle\Aws\Mws\Model\Feed;

use Guzzle\Aws\Mws\MwsClient;

/**
 * Abstract feed class
 *
 * This is used to build the basic structure
 * of a feed, to be used with the SubmitFeed command.
 *
 * @author Harold Asbridge <harold@shoebacca.com>
 */
abstract class AbstractFeed
{

    /**
     * @var MwsClient
     */
    protected $client;
    /**
     * @var XMLWriter
     */
    protected $xml;
    /**
     * @var string Feed type
     */
    protected $feedType;
    /**
     * @var int Message counter
     */
    protected $messageCount = 1;
    /**
     * @var string XML output
     */
    protected $output;

    /**
     * Init feed with shared properties
     *
     * @param MwsClient $client 
     */
    public function __construct(MwsClient $client)
    {
        $this->client = $client;

        $this->xml = new \XMLWriter();
        $this->xml->openMemory();
        $this->xml->setIndent(true);
        $this->xml->setIndentString("\t");
        $this->xml->startDocument('1.0', 'UTF-8');
        $this->xml->startElement('AmazonEnvelope');
        $this->xml->writeAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $this->xml->writeAttribute('xsi:noNamespaceSchemaLocation', 'amzn-envelope.xsd');

        // Header
        $this->xml->startElement('Header');
        $this->xml->writeElement('DocumentVersion', '1.01');
        $this->xml->writeElement('MerchantIdentifier', $client->getConfig('merchant_id'));
        $this->xml->endElement();

        $this->xml->writeElement('MessageType', $this->feedType);
        $this->xml->writeElement('PurgeAndReplace', 'false');
    }

    /**
     * Get XMLWriter instance
     * 
     * @return XMLWriter
     */
    public function getXml()
    {
        return $this->xml;
    }

    /**
     * Get feed as XML string
     *
     * @return string
     */
    public function toString()
    {
        if (!$this->output) {
            $this->xml->endDocument();
            $this->output = $this->xml->outputMemory(true);
        }
        
        // Remove empty elements
        $this->output = preg_replace('#<[^>]*/>#', '', $this->output);
        
        return $this->output;
    }

    /**
     * Alias of toString()
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }

}