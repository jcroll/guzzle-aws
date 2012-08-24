<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;


/**
 * Relation data type
 * 
 * Used to specify a product's relation to another product
 * 
 * Example:
 * <Relation>
 *   <SKU>ASDF1234</SKU>
 *   <Type>Variation</Type>
 * </Relation>
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class Relation extends AbstractDataType
{
    /**
     * Init object
     * 
     * @param string $sku
     * @param string $type 
     */
    public function __construct($sku = null, $type = null)
    {
        if ($sku !== null) {
            $this->setSku($sku);
        }
        if ($type !== null) {
            $this->setType($type);
        }
    }
    
    /**
     * @param string $value
     * 
     * @return Relation
     */
    public function setSku($value)
    {
        return $this->set('sku', $value);
    }
    
    /**
     * @param string $value
     * 
     * @return Relation
     */
    public function setType($value)
    {
        if (!in_array($value, array(
            'Variation',
            'DisplaySet',
            'Collection',
            'Accessory',
            'Customized',
            'Part',
            'Complements',
            'Piece',
            'Necessary',
            'ReplacementPart',
            'Similar',
            'Episode',
            'Season'
        ))) {
            throw new \InvalidArgumentException('Invalid relation type');
        }
        
        return $this->set('type', $value);
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
        if ($sku = $this->get('sku')) {
            $xml->writeElement('SKU', $sku);
        }
        if ($type = $this->get('type')) {
            $xml->writeElement('Type', $type);
        }
        $xml->endElement();
    }
}