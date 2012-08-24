<?php

namespace Guzzle\Aws\Mws\Model\Feed;

/**
 * Price feed class
 * 
 * Used to set prices on products
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class PriceFeed extends AbstractFeed
{

    /**
     * {@inheritdoc}
     */
    protected $feedType = 'Price';

    /**
     * Add price to feed
     * 
     * @param PriceFeed\Price $price
     * 
     * @return PriceFeed 
     */
    public function addPrice(PriceFeed\Price $price)
    {
        $this->xml->startElement('Message');
        $this->xml->writeElement('MessageID', $this->messageCount);
        $this->xml->writeElement('OperationType', 'Update');

        $price->writeXml();

        $this->xml->endElement();
        $this->messageCount++;

        return $this;
    }

}