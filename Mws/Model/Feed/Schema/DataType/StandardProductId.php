<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * StandardProductID data type
 * 
 * Used to specify a product UPC, ASIN, ISBN, etc
 * 
 * Example:
 * <StandardProductID>
 *   <Type>UPC</Type>
 *   <Value>123456</Value>
 * </StandardProductID>
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class StandardProductId extends AbstractDataType
{

    /**
     * @param string $idType
     * @param string $idValue 
     */
    public function __construct($idType = null, $idValue = null)
    {
        if ($idType !== null) {
            $this->setType($idType);
        }
        if ($idValue !== null) {
            $this->setValue($idValue);
        }
    }

    /**
     * @param string $value (ISBN, UPC, EAN, ASIN, GTIN)
     * 
     * @return StandardProductId
     */
    public function setType($value)
    {
        if (!in_array($value, array(
                'ISBN',
                'UPC',
                'EAN',
                'ASIN',
                'GTIN'
            ))) {
            throw new \InvalidArgumentException('Invalid product id type');
        }

        return $this->set('type', $value);
    }

    /**
     * @param string $value
     * 
     * @return StandardProductId
     */
    public function setValue($value)
    {
        return $this->set('value', $value);
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
        if ($type = $this->get('type')) {
            $xml->writeElement('Type', $type);
        }
        if ($value = $this->get('value')) {
            $xml->writeElement('Value', $value);
        }
        $xml->endElement();
    }

}