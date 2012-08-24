<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * CurrencyAmount data type
 * 
 * Used when specifying price/currency amounts
 * 
 * Example:
 * <Price currency="USD">49.99</Price>
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class CurrencyAmount extends AbstractDataType
{

    /**
     * Init object
     * 
     * @param float $value
     * @param string $baseCurrencyCode 
     */
    public function __construct($value = null, $baseCurrencyCode = null)
    {
        if ($value !== null) {
            $this->setValue($value);
        }
        if ($baseCurrencyCode !== null) {
            $this->setBaseCurrencyCode($baseCurrencyCode);
        }
    }

    /**
     * Set currency value
     * 
     * @param float $value
     * 
     * @return CurrencyAmount 
     */
    public function setValue($value)
    {
        return $this->set('value', number_format($value, 2, '.', ''));
    }

    /**
     * Set base currency code
     * 
     * @param string $currencyCode (USD, GBP, EUR, JPY, CAD, CNY)
     * 
     * @return CurrencyAmount
     */
    public function setBaseCurrencyCode($currencyCode)
    {
        if (!in_array($currencyCode, array(
                'USD',
                'GBP',
                'EUR',
                'JPY',
                'CAD',
                'CNY'
            ))) {
            throw new \InvalidArgumentException('Invalid currency code');
        }
        return $this->set('baseCurrencyCode', $currencyCode);
    }

    /**
     * Write XML to output
     * 
     * @param \XMLWriter $xml
     * @param string $nodeName
     * 
     * @return CurrencyAmount 
     */
    public function writeXml(\XMLWriter $xml, $nodeName)
    {
        $xml->startElement($nodeName);
        $xml->writeAttribute('currency', $this->get('baseCurrencyCode'));
        $xml->text($this->get('value'));
        $xml->endElement();

        return $this;
    }

}