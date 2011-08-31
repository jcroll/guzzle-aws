<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\ImageFeed\Image;

class ImageFeedTest extends GuzzleTestCase
{
    public function testImageFeed()
    {
        $client = $this->getServiceBuilder()->get('test.mws');
        $feed = $client->getFeed('image');
        
        $this->assertInstanceOf('Guzzle\Aws\Mws\Model\Feed\ImageFeed', $feed);
        
        $dom = new \DOMDocument();
        $dom->loadXML($feed->toString());
        
        $this->assertSelectEquals('AmazonEnvelope MessageType', 'ProductImage', true, $dom, null, false);
    }
    
    /**
     * @depends testImageFeed
     */
    public function testAddImage()
    {
        $client = $this->getServiceBuilder()->get('test.mws');
        $feed = $client->getFeed('image');
        
        $image = new Image($feed->getXml());
        $image
            ->setSku('ASDF')
            ->setImageLocation('http://www.example.org');
        
        $feed->addImage($image);
        
        $dom = new \DOMDocument();
        $dom->loadXML($feed->toString());
        
        $this->assertSelectEquals('AmazonEnvelope Message MessageID', '1', true, $dom, null, false);
        $this->assertSelectEquals('AmazonEnvelope Message OperationType', 'Update', true, $dom, null, false);
        $this->assertSelectCount('AmazonEnvelope Message ProductImage', 1, $dom, null, false);
    }
}