<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\Schema\DataType;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\LengthDimension;

class AbstractDataTypeTest extends GuzzleTestCase
{
    public function testAbstractDataType()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");

        $node = LengthDimension::factory();
        $node
            ->setValue(1)
            ->setUnitOfMeasure('IN');
        
        $node->writeXml($xml, 'LengthDimension');
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../../XSD/DataType.xsd'));
    }
}