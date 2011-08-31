<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\Schema\DataType;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\WeightDimension;

class WeightDimensionTest extends GuzzleTestCase
{
    public function testWeightDimension()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");

        $node = new WeightDimension(1, 'LB');
        $node
            ->setValue(1)
            ->setUnitOfMeasure('LB');
        
        $node->writeXml($xml, 'WeightDimension');
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../../XSD/DataType.xsd'));
    }
}