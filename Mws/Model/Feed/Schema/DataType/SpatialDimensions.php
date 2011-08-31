<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * SpatialDimensions data type class
 * 
 * Used to specify a product's physical dimensions
 * 
 * Example:
 * <Dimensions>
 *   <Length unitOfMeasure="IN">12</Length>
 *   <Width unitOfMeasure="IN">10</Width>
 *   <Height unitOfMeasure="IN">6</Height>
 * </Dimensions>
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class SpatialDimensions extends AbstractDataType
{

    /**
     * Init object
     * 
     * @param LengthDimension $length
     * @param LengthDimension $width
     * @param LengthDimension $height 
     */
    public function __construct(LengthDimension $length = null, LengthDimension $width = null, LengthDimension $height = null)
    {
        if ($length !== null) {
            $this->setLength($length);
        }
        if ($width !== null) {
            $this->setWidth($width);
        }
        if ($height !== null) {
            $this->setHeight($height);
        }
    }

    /**
     * Set length
     * 
     * @param LengthDimension $length
     * 
     * @return SpatialDimensions 
     */
    public function setLength(LengthDimension $length)
    {
        return $this->set('Length', $length);
    }

    /**
     * Set width
     * 
     * @param LengthDimension $width
     * 
     * @return SpatialDimensions 
     */
    public function setWidth(LengthDimension $width)
    {
        return $this->set('Width', $width);
    }

    /**
     * Set height
     * 
     * @param LengthDimension $height
     * 
     * @return SpatialDimensions 
     */
    public function setHeight(LengthDimension $height)
    {
        return $this->set('Height', $height);
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
        if ($length = $this->get('Length')) {
            $length->writeXml($xml, 'Length');
        }
        if ($width = $this->get('Width')) {
            $width->writeXml($xml, 'Width');
        }
        if ($height = $this->get('Height')) {
            $height->writeXml($xml, 'Height');
        }
        $xml->endElement();
    }

}