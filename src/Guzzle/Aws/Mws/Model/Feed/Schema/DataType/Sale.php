<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * Sale data type
 * 
 * Used when specifying sale details
 * 
 * Example:
 * <Sale>
 *   <StartDate>2011-01-01T00:00:00</StartDate>
 *   <EndDate>2011-01-02T00:00:00</EndDate>
 *   <SalePrice currency="USD">29.99</SalePrice>
 * </Sale>
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class Sale extends AbstractDataType
{

    /**
     * Init object
     * 
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param CurrencyAmount $salePrice 
     */
    public function __construct(\DateTime $startDate = null, \DateTime $endDate = null, CurrencyAmount $salePrice = null)
    {
        if ($startDate !== null) {
            $this->setStartDate($startDate);
        }
        if ($endDate !== null) {
            $this->setEndDate($endDate);
        }
        if ($salePrice !== null) {
            $this->setSalePrice($salePrice);
        }
    }

    /**
     * Set start date
     * 
     * @param \DateTime $value
     * 
     * @return Sale 
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
     * @return Sale
     */
    public function setEndDate(\DateTime $value)
    {
        return $this->set('endDate', $value);
    }

    /**
     * Set sale price
     * 
     * @param CurrencyAmount $value
     * 
     * @return Sale
     */
    public function setSalePrice(CurrencyAmount $value)
    {
        return $this->set('salePrice', $value);
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
        if ($salePrice = $this->get('salePrice')) {
            $salePrice->writeXml($xml, 'SalePrice');
        }
        $xml->endElement();
    }

}