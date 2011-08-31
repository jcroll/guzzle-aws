<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\OrderFulfillmentFeed;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\OrderFulfillmentFeed\OrderFulfillment;

class OrderFulfillmentTest extends GuzzleTestCase
{
    public function testOrderFulfillmentByAmazonOrderId()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        
        $f = new OrderFulfillment($xml);
        $f
            ->setAmazonOrderId('000-0000000-0000000')
            ->setCarrierCode('UPS')
            ->setFulfillmentDate(new \DateTime('2000-01-01T00:00:00-06:00'))
            ->setMerchantFulfillmentId(123)
            ->setShipperTrackingNumber('1Z0')
            ->setShippingMethod('Ground');
        
        $f->writeXml();
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../XSD/Fulfillment.xsd'));
    }
    
    public function testOrderFulfillmentByMerchantOrderId()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        
        $f = new OrderFulfillment($xml);
        $f
            ->setMerchantOrderId(123)
            ->setCarrierCode('UPS')
            ->setFulfillmentDate(new \DateTime('2000-01-01T00:00:00-06:00'))
            ->setMerchantFulfillmentId(123)
            ->setShipperTrackingNumber('1Z0')
            ->setShippingMethod('Ground');
        
        $f->writeXml();
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../XSD/Fulfillment.xsd'));
    }
    
    public function testOrderFulfillmentByCarrierCode()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        
        $f = new OrderFulfillment($xml);
        $f
            ->setMerchantOrderId(123)
            ->setCarrierCode('UPS')
            ->setFulfillmentDate(new \DateTime('2000-01-01T00:00:00-06:00'))
            ->setMerchantFulfillmentId(123)
            ->setShipperTrackingNumber('1Z0')
            ->setShippingMethod('Ground');
        
        $f->writeXml();
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../XSD/Fulfillment.xsd'));
    }
    
    public function testOrderFulfillmentByCarrierName()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        
        $f = new OrderFulfillment($xml);
        $f
            ->setMerchantOrderId(123)
            ->setCarrierName('UPS')
            ->setFulfillmentDate(new \DateTime('2000-01-01T00:00:00-06:00'))
            ->setMerchantFulfillmentId(123)
            ->setShipperTrackingNumber('1Z0')
            ->setShippingMethod('Ground');
        
        $f->writeXml();
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../XSD/Fulfillment.xsd'));
    }
    
    public function testSetCarrierCode()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $f = new OrderFulfillment($xml);
        
        $this->setExpectedException('InvalidArgumentException');
        $f->setCarrierCode('Foo');
    }
}