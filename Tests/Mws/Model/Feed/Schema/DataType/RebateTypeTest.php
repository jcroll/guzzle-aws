<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\Schema\DataType;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\RebateType;

class RebateTypeTest extends GuzzleTestCase
{
    public function testRebateType()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $node = new RebateType(new \DateTime(), new \DateTime(), 'Foo', 'Bar');
        
        $node
            ->setRebateStartDate(new \DateTime())
            ->setRebateEndDate(new \DateTime())
            ->setRebateMessage('Foo')
            ->setRebateName('Bar');
        
        $node->writeXml($xml, 'RebateType');
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../../XSD/DataType.xsd'));
    }
    
    public function testSetRebateMessage()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $node = new RebateType();
        $this->setExpectedException('InvalidArgumentException');
        $node->setRebateMessage(str_repeat('x', 300));
    }
    
    public function testSetRebateName()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $node = new RebateType();
        $this->setExpectedException('InvalidArgumentException');
        $node->setRebateName(str_repeat('x', 300));
    }
}