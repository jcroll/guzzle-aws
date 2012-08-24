<?php

namespace Guzzle\Aws\Mws\Model\Feed;

use Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * Feed item base class
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
abstract class AbstractFeedItem
{

    /**
     * @var array interndal data array
     */
    protected $data;
    /**
     * @var XMLWriter xml output
     */
    protected $xml;

    /**
     * Initialize feed item
     * 
     * @param \XMLWriter $xml
     */
    public function __construct(\XMLWriter $xml)
    {
        $this->xml = $xml;
    }

    /**
     * Add a value for a multi-valued node
     * 
     * @param string $key
     * @param mixed $value
     * @param int $max optional max occurrences
     * 
     * @return AbstractProduct 
     */
    public function add($key, $value, $max = 0)
    {
        if (!isset($this->data[$key])) {
            $this->data[$key] = array();
        }
        $this->data[$key][] = $value;

        if ($max) {
            if (count($this->data[$key]) > $max) {
                throw new \RuntimeException('Too many values for element ' . $key);
            }
        }

        return $this;
    }

    /**
     * Set value
     * 
     * @param string $key
     * @param mixed $value
     * 
     * @return AbstractProduct 
     */
    public function set($key, $value)
    {
        if ($value === null) {
            throw new \InvalidArgumentException('Value is required');
        }

        $this->data[$key] = $value;

        return $this;
    }

    /**
     * Get value
     * 
     * @param string $key
     * 
     * @return mixed|null
     */
    public function get($key)
    {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }

    /**
     * Write XML output
     * 
     * @param string $nodeName
     * 
     * @return AbstractFeedItem
     */
    public function writeNode($nodeName)
    {
        $value = $this->get($nodeName);

        // Skip empty nodes
        if ($value === null) {
            return $this;
        }

        // Detect value type
        if (is_array($value)) {
            // array
            foreach ($value as $k => $v) {
                if ($v instanceOf DataType\DataTypeInterface) {
                    $v->writeXml($this->xml, $nodeName);
                } else {
                    $this->xml->writeElement($nodeName, $v);
                }
            }
        } else if (is_bool($value)) {
            // boolean, write as string
            $this->xml->writeElement($nodeName, ($value) ? 'true' : 'false');
        } else if ($value instanceof \DateTime) {
            // DateTime
            $this->xml->writeElement($nodeName, $value->format('c'));
        } else if ($value instanceof DataType\DataTypeInterface) {
            // Custom data type
            $value->writeXml($this->xml, $nodeName);
        } else {
            // string, int, or float
            // Strip any non-ascii chars
            $value = preg_replace('/[^(\x20-\x7F)]*/', '', $value);
            $this->xml->writeElement($nodeName, $value);
        }

        return $this;
    }

    /**
     * Build and return XML string
     * 
     * @return string
     */
    public function toString()
    {
        $this->xml->endDocument();
        
        return $this->xml->outputMemory();
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