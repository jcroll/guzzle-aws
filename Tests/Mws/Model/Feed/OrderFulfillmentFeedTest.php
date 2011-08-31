<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\OrderFulfillmentFeed\OrderFulfillment;

/**
 * @covers Guzzle\Aws\Mws\Model\Feed\OrderFulfillmentFeed
 * @covers Guzzle\Aws\Mws\Model\Feed\AbstractFeed
 */
class OrderFulfillmentFeedTest extends GuzzleTestCase
{
    public function testOrderFulfillmentFeed()
    {
        $client = $this->getServiceBuilder()->get('test.mws');
        $feed = $client->getFeed('order_fulfillment');

        $this->assertInstanceOf('Guzzle\Aws\Mws\Model\Feed\OrderFulfillmentFeed', $feed);
        
        $dom = new \DOMDocument();
        $dom->loadXML($feed->toString());
        
        $this->assertSelectEquals('AmazonEnvelope MessageType', 'OrderFulfillment', true, $dom, null, false);
    }
    
    /**
     * @depends testOrderFulfillmentFeed
     */
    public function testAddFulfillment()
    {
        $client = $this->getServiceBuilder()->get('test.mws');
        $feed = $client->getFeed('order_fulfillment');
        
        $fulfillment = new OrderFulfillment($feed->getXml());
        $fulfillment
            ->setAmazonOrderId('000-123-123')
            ->setShipperTrackingNumber('ASDF');
        
        $feed->addFulfillment($fulfillment);
        
        $dom = new \DOMDocument();
        $dom->loadXML($feed->toString());
        
        $this->assertSelectEquals('AmazonEnvelope Message MessageID', '1', true, $dom, null, false);
        $this->assertSelectEquals('AmazonEnvelope Message OperationType', 'Update', true, $dom, null, false);
        $this->assertSelectCount('AmazonEnvelope Message OrderFulfillment', 1, $dom, null, false);
        $this->assertSelectCount('AmazonEnvelope Message OrderFulfillment FulfillmentData', 1, $dom, null, false);
    }
}