<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\Schema\DataType;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\WattageDimension;

class WattageDimensionTest extends GuzzleTestCase
{
    public function testWattageDimension()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $node = new WattageDimension(1, 'watts');
        
        $node
            ->setValue(1)
            ->setUnitOfMeasure('watts');
        
        $node->writeXml($xml, 'WattageDimension');
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../../XSD/DataType.xsd'));
    }
}