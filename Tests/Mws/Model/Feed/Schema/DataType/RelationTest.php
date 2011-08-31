<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\Schema\DataType;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\Relation;

class RelationTest extends GuzzleTestCase
{
    public function testRelation()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $node = new Relation('ASDF', 'Variation');
        $node
            ->setSku('ASDF')
            ->setType('Variation');
        
        $node->writeXml($xml, 'Relation');
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../../XSD/DataType.xsd'));
    }
    
    public function testSetType()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $node = new Relation();
        $this->setExpectedException('InvalidArgumentException');
        $node->setType('Foo');
    }
}