<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\Schema\DataType;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\ConditionInfo;

class ConditionInfoTest extends GuzzleTestCase
{
    public function testConditionInfo()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $node = new ConditionInfo('New', 'Unopened');
        $node
            ->setConditionType('New')
            ->setConditionNote('Unopened');
        
        $node->writeXml($xml, 'ConditionInfo');
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../../XSD/DataType.xsd'));
    }
    
    /**
     * @depends testConditionInfo
     */
    public function testSetConditionType()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $node = new ConditionInfo();
        
        $this->setExpectedException('InvalidArgumentException');
        $node->setConditionType('Foo');
    }
}