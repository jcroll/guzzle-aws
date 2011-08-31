<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\Schema\DataType;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\TemperatureRatingDimension;

class TemperatureRatingDimensionTest extends GuzzleTestCase
{
    public function testTemperatureRatingDimension()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $node = new TemperatureRatingDimension(100, 'degrees-fahrenheit');
        $node
            ->setValue(100)
            ->setUnitOfMeasure('degrees-fahrenheit');
        
        $node->writeXml($xml, 'TemperatureRatingDimension');
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../../XSD/DataType.xsd'));
    }
}