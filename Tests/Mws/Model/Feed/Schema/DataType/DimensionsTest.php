<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\Schema\DataType;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\Dimensions;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\LengthDimension;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\WeightDimension;

class DimensionsTest extends GuzzleTestCase
{
    public function testDimensions()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $node = new Dimensions(
                LengthDimension::factory(1, 'IN'), 
                LengthDimension::factory(2, 'IN'), 
                LengthDimension::factory(3, 'IN'), 
                WeightDimension::factory(4, 'LB'));
        
        $node
        ->setLength(LengthDimension::factory(1, 'IN'))
                ->setWidth(LengthDimension::factory(2, 'IN'))
                ->setHeight(LengthDimension::factory(3, 'IN'))
                ->setWeight(WeightDimension::factory(4, 'LB'));
        
        $node->writeXml($xml, 'Dimensions');
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../../XSD/DataType.xsd'));
    }
}