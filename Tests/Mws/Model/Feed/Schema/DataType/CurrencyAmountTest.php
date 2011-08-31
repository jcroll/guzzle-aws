<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\Schema\DataType;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\CurrencyAmount;

class CurrencyAmountTest extends GuzzleTestCase
{
    public function testCurrencyAmount()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $node = new CurrencyAmount(100, 'USD');
        $node
            ->setValue(100)
            ->setBaseCurrencyCode('USD');
        
        $node->writeXml($xml, 'CurrencyAmount');
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../../XSD/DataType.xsd'));
    }
    
    public function testSetBaseCurrencyCode()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $node = new CurrencyAmount();
        $this->setExpectedException('InvalidArgumentException');
        $node->setBaseCurrencyCode('Foo');
    }
}