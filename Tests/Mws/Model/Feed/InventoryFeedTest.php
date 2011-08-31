<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\InventoryFeed\Inventory;

class InventoryFeedTest extends GuzzleTestCase
{

    public function testInventoryFeed()
    {
        $client = $this->getServiceBuilder()->get('test.mws');
        $feed = $client->getFeed('inventory');

        $this->assertInstanceOf('Guzzle\Aws\Mws\Model\Feed\InventoryFeed', $feed);

        $dom = new \DOMDocument();
        $dom->loadXML($feed->toString());

        $this->assertSelectEquals('AmazonEnvelope MessageType', 'Inventory', true, $dom, null, false);
    }

    /**
     * @depends testInventoryFeed
     */
    public function testAddInventory()
    {
        $client = $this->getServiceBuilder()->get('test.mws');
        $feed = $client->getFeed('inventory');

        $inventory = new Inventory($feed->getXml());
        $inventory
            ->setSku('ASDF')
            ->setQuantity(1);

        $feed->addInventory($inventory);

        $dom = new \DOMDocument();
        $dom->loadXML($feed->toString());

        $this->assertSelectEquals('AmazonEnvelope Message MessageID', '1', true, $dom, null, false);
        $this->assertSelectEquals('AmazonEnvelope Message OperationType', 'Update', true, $dom, null, false);
        $this->assertSelectCount('AmazonEnvelope Message Inventory', 1, $dom, null, false);
    }

}