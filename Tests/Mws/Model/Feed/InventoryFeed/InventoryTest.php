<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\InventoryFeed;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\InventoryFeed\Inventory;

class InventoryTest extends GuzzleTestCase
{
    public function testInventoryByAvailable()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        
        $inv = new Inventory($xml);
        $inv
            ->setAvailable(true)
            ->setFulfillmentCenterId(123)
            ->setFulfillmentLatency(5)
            ->setRestockDate(new \DateTime())
            ->setSku('ASDF')
            ->setSwitchFulfillmentTo('AFN');
        
        $inv->writeXml();
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../XSD/Inventory.xsd'));
    }
    
    public function testInventoryByQuantity()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        
        $inv = new Inventory($xml);
        $inv
            ->setFulfillmentCenterId(123)
            ->setFulfillmentLatency(5)
            ->setQuantity(10)
            ->setRestockDate(new \DateTime())
            ->setSku('ASDF')
            ->setSwitchFulfillmentTo('AFN');
        
        $inv->writeXml();
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../XSD/Inventory.xsd'));
    }
    
    public function testInventoryByLookup()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        
        $inv = new Inventory($xml);
        $inv
            ->setFulfillmentCenterId(123)
            ->setFulfillmentLatency(5)
            ->setLookup('FulfillmentNetwork')
            ->setRestockDate(new \DateTime())
            ->setSku('ASDF')
            ->setSwitchFulfillmentTo('AFN');
        
        $inv->writeXml();
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../XSD/Inventory.xsd'));
    }
    
    public function testSetLookup()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        
        $this->setExpectedException('InvalidArgumentException');
        $inv = new Inventory($xml);
        $inv->setLookup('Foo');
    }
    
    public function testSetSwitchFulfillmentTo()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        
        $this->setExpectedException('InvalidArgumentException');
        $inv = new Inventory($xml);
        $inv->setSwitchFulfillmentTo('Foo');
    }
    
    public function testWriteXml()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        
        $this->setExpectedException('RuntimeException');
        $inv = new Inventory($xml);
        
        $inv->writeXml();
    }
}