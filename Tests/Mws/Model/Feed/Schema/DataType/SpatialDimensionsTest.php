<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\Schema\DataType;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\SpatialDimensions;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\LengthDimension;

class SpatialDimensionsTest extends GuzzleTestCase
{
    public function testSpatialDimensions()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $node = new SpatialDimensions(
                LengthDimension::factory(1, 'IN'), 
                LengthDimension::factory(2, 'IN'), 
                LengthDimension::factory(3, 'IN'));
        
        $node
            ->setLength(LengthDimension::factory(1, 'IN'))
            ->setWidth(LengthDimension::factory(2, 'IN'))
            ->setHeight(LengthDimension::factory(3, 'IN'));
        
        $node->writeXml($xml, 'SpatialDimensions');
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../../XSD/DataType.xsd'));
    }
}