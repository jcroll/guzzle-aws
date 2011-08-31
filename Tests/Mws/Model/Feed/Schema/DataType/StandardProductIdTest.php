<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\Schema\DataType;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\StandardProductId;

class StandardProductIdTest extends GuzzleTestCase
{
    public function testStandardProductId()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $node = new StandardProductId('UPC', 12345678);
        $node
            ->setType('UPC')
            ->setValue(12345678);
        
        $node->writeXml($xml, 'StandardProductID');
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../../XSD/DataType.xsd'));
    }
    
    public function testSetStandardProductId()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $node = new StandardProductId();
        $this->setExpectedException('InvalidArgumentException');
        $node->setType('Foo');
    }
}