<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * Dated Price data type
 * 
 * Used to specify a previous product price
 * 
 * Example:
 * <Previous>
 *   <StartDate>2011-01-01T00:00:00</StartDate>
 *   <EndDate>2011-02-02T00:00:00</EndDate>
 *   <Price currency="USD">29.99</Price>
 * </Previous>
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class DatedPrice extends AbstractDataType
{

    /**
     * Init object
     * 
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param CurrencyAmount $price 
     */
    public function __construct(\DateTime $startDate = null, \DateTime $endDate = null, CurrencyAmount $price = null)
    {
        if ($startDate !== null) {
            $this->setStartDate($startDate);
        }
        if ($endDate !== null) {
            $this->setEndDate($endDate);
        }
        if ($price !== null) {
            $this->setPrice($price);
        }
    }

    /**
     * Set start date
     * 
     * @param \DateTime $value
     * 
     * @return DatedPrice 
     */
    public function setStartDate(\DateTime $value)
    {
        return $this->set('startDate', $value);
    }

    /**
     * Set end date
     * 
     * @param \DateTime $value
     * 
     * @return DatedPrice
     */
    public function setEndDate(\DateTime $value)
    {
        return $this->set('endDate', $value);
    }

    /**
     * Set price
     * 
     * @param CurrencyAmount $value
     * 
     * @return DatedPrice 
     */
    public function setPrice(CurrencyAmount $value)
    {
        return $this->set('price', $value);
    }

    /**
     * Write XML output
     * 
     * @param \XMLWriter $xml
     * @param string $nodeName 
     */
    public function writeXml(\XMLWriter $xml, $nodeName)
    {
        $xml->startElement($nodeName);
        if ($startDate = $this->get('startDate')) {
            $xml->writeElement('StartDate', $startDate->format('c'));
        }
        if ($endDate = $this->get('endDate')) {
            $xml->writeElement('EndDate', $endDate->format('c'));
        }
        if ($salePrice = $this->get('price')) {
            $salePrice->writeXml($xml, 'Price');
        }
        $xml->endElement();
    }

}