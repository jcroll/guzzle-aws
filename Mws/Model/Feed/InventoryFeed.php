<?php

namespace Guzzle\Aws\Mws\Model\Feed;

use Guzzle\Aws\Mws\Model\Feed\InventoryFeed\Inventory;

/**
 * Inventory feed class
 * 
 * Used for setting inventory levels on products
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class InventoryFeed extends AbstractFeed
{

    /**
     * {@inheritdoc}
     */
    protected $feedType = 'Inventory';

    /**
     * Add inventory to feed
     * 
     * @param Inventory $inventory
     * 
     * @return InventoryFeed 
     */
    public function addInventory(Inventory $inventory)
    {
        $this->xml->startElement('Message');
        $this->xml->writeElement('MessageID', $this->messageCount);
        $this->xml->writeElement('OperationType', 'Update');

        $inventory->writeXml();

        $this->xml->endElement();
        $this->messageCount++;

        return $this;
    }

}