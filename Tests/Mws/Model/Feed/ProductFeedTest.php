<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\ProductFeed\ClothingProduct;

/**
 * @covers Guzzle\Aws\Mws\Model\Feed\AbstractFeed
 * @covers Guzzle\Aws\Mws\Model\Feed\ProductFeed
 */
class ProductFeedTest extends GuzzleTestCase
{
    public function testProductFeed()
    {
        $client = $this->getServiceBuilder()->get('test.mws');
        $feed = $client->getFeed('product');
        
        $this->assertInstanceOf('Guzzle\Aws\Mws\Model\Feed\ProductFeed', $feed);
        
        $dom = new \DOMDocument();
        $dom->loadXML($feed->toString());
        
        $this->assertSelectEquals('AmazonEnvelope MessageType', 'Product', true, $dom, null, false);
        
        $this->assertInternalType('string', $feed->__toString());
    }
    
    /**
     * @depends testProductFeed
     */
    public function testAddProduct()
    {
        $client = $this->getServiceBuilder()->get('test.mws');
        $feed = $client->getFeed('product');
        
        $feed->addProduct(new ClothingProduct($feed->getXml()));
        
        $dom = new \DOMDocument();
        $dom->loadXML($feed->toString());
        
        $this->assertSelectEquals('AmazonEnvelope Message MessageID', '1', true, $dom, null, false);
        $this->assertSelectEquals('AmazonEnvelope Message OperationType', 'Update', true, $dom, null, false);
        $this->assertSelectCount('AmazonEnvelope Message Product', 1, $dom, null, false);
    }
}