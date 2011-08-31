<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\Schema\DataType;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\ClothingSizeDimension;

class ClothingSizeDimensionTest extends GuzzleTestCase
{
    public function testClothingSizeDimension()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $node = new ClothingSizeDimension();
        $node
            ->setValue(1)
            ->setUnitOfMeasure('IN');
        
        $node->writeXml($xml, 'ClothingSizeDimension');
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../../XSD/DataType.xsd'));
    }
}