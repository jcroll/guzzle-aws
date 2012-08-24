<?php

namespace Guzzle\Aws\Mws\Model\Feed\InventoryFeed;

use Guzzle\Aws\Mws\Model\Feed\AbstractFeedItem;

/**
 * Inventory feed item
 * 
 * Represents a single <Inventory> node in a product inventory feed
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class Inventory extends AbstractFeedItem
{

    /**
     * Set SKU
     * 
     * @param string $value
     * 
     * @return Inventory 
     */
    public function setSku($value)
    {
        return $this->set('SKU', $value);
    }

    /**
     * Set fulfillment center ID
     * 
     * @param string $value
     * 
     * @return Inventory
     */
    public function setFulfillmentCenterId($value)
    {
        return $this->set('FulfillmentCenterID', $value);
    }

    /**
     * Set available flag
     * 
     * @param bool $value
     * 
     * @return Inventory
     */
    public function setAvailable($value)
    {
        return $this->set('Available', (bool) $value);
    }

    /**
     * Set quantity
     * 
     * @param int $value
     * 
     * @return Inventory
     */
    public function setQuantity($value)
    {
        return $this->set('Quantity', $value);
    }

    /**
     * Set lookup
     * 
     * @param string $value
     * 
     * @return Inventory
     */
    public function setLookup($value)
    {
        if (!in_array($value, array('FulfillmentNetwork'))) {
            throw new \InvalidArgumentException('Invalid lookup value');
        }

        return $this->set('Lookup', $value);
    }

    /**
     * Set restock date
     * 
     * @param \DateTime $value
     * 
     * @return Inventory 
     */
    public function setRestockDate(\DateTime $value)
    {
        return $this->set('RestockDate', $value->format('Y-m-d'));
    }

    /**
     * Set fulfillment latency
     * 
     * @param int $value
     * 
     * @return Inventory 
     */
    public function setFulfillmentLatency($value)
    {
        return $this->set('FulfillmentLatency', $value);
    }

    /**
     * Set switch fulfillment to
     * 
     * @param string $value
     * 
     * @return Inventory
     */
    public function setSwitchFulfillmentTo($value)
    {
        if (!in_array($value, array('MFN', 'AFN'))) {
            throw new \InvalidArgumentException('Invalid value for SwitchFulfillmentTo');
        }

        return $this->set('SwitchFulfillmentTo', $value);
    }

    /**
     * Write XML output
     */
    public function writeXml()
    {
        $this->xml->startElement('Inventory');
        $this
            ->writeNode('SKU')
            ->writeNode("FulfillmentCenterID");

        if ($this->get('Available') !== null) {
            $this->writeNode('Available');
        } else if ($this->get('Quantity') !== null) {
            $this->writeNode('Quantity');
        } else if ($this->get('Lookup') !== null) {
            $this->writeNode('Lookup');
        } else {
            throw new \RuntimeException('One of the following must be set: Available, Quantity, Lookup');
        }

        $this
            ->writeNode('RestockDate')
            ->writeNode('FulfillmentLatency')
            ->writeNode('SwitchFulfillmentTo');
        $this->xml->endElement();
    }

}