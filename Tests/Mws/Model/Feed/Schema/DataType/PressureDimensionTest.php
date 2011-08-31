<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\Schema\DataType;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\PressureDimension;

class PressureDimensionTest extends GuzzleTestCase
{
    public function testPressureDimension()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");

        $node = new PressureDimension(1, 'bars');
        $node
            ->setValue(1)
            ->setUnitOfMeasure('bars');
        
        $node->writeXml($xml, 'PressureDimension');
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../../XSD/DataType.xsd'));
    }
}