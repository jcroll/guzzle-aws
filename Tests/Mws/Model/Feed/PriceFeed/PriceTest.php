<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\PriceFeed;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\PriceFeed\Price;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

class PriceTest extends GuzzleTestCase
{
    public function testPrice()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        
        $price = new Price($xml);
        $price->setDepositAmount(DataType\CurrencyAmount::factory('1.00', 'USD'))
                ->setMAP(DataType\CurrencyAmount::factory('2.00', 'USD'))
                ->setPrevious(DataType\DatedPrice::factory(
                        new \DateTime('2000-01-01T00:00:00-06:00'),
                        new \DateTime('2001-01-01T00:00:00-06:00'),
                        DataType\CurrencyAmount::factory('3.00', 'USD')
                ))
                ->setSale(DataType\Sale::factory(
                        new \DateTime('2002-01-01T00:00:00-06:00'),
                        new \DateTime('2003-01-03T00:00:00-06:00'),
                        DataType\CurrencyAmount::factory('4.00', 'USD')
                ))
                ->setSku('ASDF')
                ->setStandardPrice(DataType\CurrencyAmount::factory('5.00', 'USD'));
        
        $price->writeXml();
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../XSD/Price.xsd'));
    }
}