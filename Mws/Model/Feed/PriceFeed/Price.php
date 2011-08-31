<?php

namespace Guzzle\Aws\Mws\Model\Feed\PriceFeed;

use Guzzle\Aws\Mws\Model\Feed\AbstractFeedItem;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * Price feed item
 * 
 * Represents a single <Price> node in a product price feed
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class Price extends AbstractFeedItem
{

    /**
     * Set product SKU
     * 
     * @param string $value
     * 
     * @return Price 
     */
    public function setSku($value)
    {
        return $this->set('SKU', $value);
    }

    /**
     * Set standard price
     * 
     * @param DataType\CurrencyAmount $value
     * 
     * @return Price 
     */
    public function setStandardPrice(DataType\CurrencyAmount $value)
    {
        return $this->set('StandardPrice', $value);
    }

    /**
     * Set MAP price
     * 
     * @param DataType\CurrencyAmount $value
     * 
     * @return Price 
     */
    public function setMAP(DataType\CurrencyAmount $value)
    {
        return $this->set('MAP', $value);
    }

    /**
     * Set deposit amount
     * 
     * @param DataType\CurrencyAmount $value
     * 
     * @return Price 
     */
    public function setDepositAmount(DataType\CurrencyAmount $value)
    {
        return $this->set('DepositAmount', $value);
    }

    /**
     * Set sale params
     * 
     * @param DataType\Sale $value
     * 
     * @return Price 
     */
    public function setSale(DataType\Sale $value)
    {
        return $this->set('Sale', $value);
    }

    /**
     * Set previous price
     * 
     * @param DataType\DatedPrice $value
     * 
     * @return Price 
     */
    public function setPrevious(DataType\DatedPrice $value)
    {
        return $this->set('Previous', $value);
    }

    /**
     * Write XML output
     * 
     * @return Price 
     */
    public function writeXml()
    {
        $this->xml->startElement('Price');
        $this
            ->writeNode('SKU')
            ->writeNode('StandardPrice')
            ->writeNode('MAP')
            ->writeNode('DepositAmount')
            ->writeNode('Sale')
            ->writeNode('Previous');
        $this->xml->endElement();

        return $this;
    }

}