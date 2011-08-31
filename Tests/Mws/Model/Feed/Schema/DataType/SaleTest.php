<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\Schema\DataType;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\Sale;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\CurrencyAmount;

class SaleTest extends GuzzleTestCase
{
    public function testSale()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $node = new Sale(new \DateTime(), new \DateTime(), CurrencyAmount::factory(1, 'USD'));
        $node
            ->setStartDate(new \DateTime())
            ->setEndDate(new \DateTime())
            ->setSalePrice(CurrencyAmount::factory(1, 'USD'));
        
        $node->writeXml($xml, 'Sale');
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../../XSD/DataType.xsd'));
    }
}