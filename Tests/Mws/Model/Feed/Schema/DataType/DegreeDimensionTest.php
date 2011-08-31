<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\Schema\DataType;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\DegreeDimension;

class DegreeDimensionTest extends GuzzleTestCase
{
    public function testDegreeDimension()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $node = new DegreeDimension(1, 'degrees');
        $node
            ->setValue(1)
            ->setUnitOfMeasure('degrees');
        
        $node->writeXml($xml, 'DegreeDimension');
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../../XSD/DataType.xsd'));
    }
}