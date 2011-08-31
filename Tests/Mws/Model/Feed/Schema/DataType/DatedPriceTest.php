<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\Schema\DataType;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\DatedPrice;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\CurrencyAmount;

class DatedPriceTest extends GuzzleTestCase
{
    public function testDatedPrice()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $node = new DatedPrice(new \DateTime(), new \DateTime(), CurrencyAmount::factory(1, 'USD'));
        $node
            ->setStartDate(new \DateTime())
            ->setEndDate(new \DateTime())
            ->setPrice(CurrencyAmount::factory(1, 'USD'));
        
        $node->writeXml($xml, 'DatedPrice');
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../../XSD/DataType.xsd'));
    }
}