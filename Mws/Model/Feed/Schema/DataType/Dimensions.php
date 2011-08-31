<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

use Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * Dimensions data type
 * 
 * Used when specifying product dimensions
 * 
 * Example:
 * <Dimensions>
 *   <Length unitOfMeasure="IN">12</Length>
 *   <Width unitOfMeasure="IN">6</Width>
 *   <Height unitOfMeasure="IN">5</Height>
 *   <Weight unitOfMeasure="LB">1.0</Weight>
 * </Dimensions>
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class Dimensions extends AbstractDataType
{

    public function __construct(LengthDimension $length = null, LengthDimension $width = null, LengthDimension $height = null, WeightDimension $weight = null)
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
        if ($weight !== null) {
            $this->setWeight($weight);
        }
    }

    /**
     * Set length
     * 
     * @param LengthDimension $value
     * 
     * @return Dimensions
     */
    public function setLength(LengthDimension $value)
    {
        return $this->set('Length', $value);
    }

    /**
     * Set width
     * 
     * @param LengthDimension $value
     * 
     * @return Dimensions
     */
    public function setWidth(LengthDimension $value)
    {
        return $this->set('Width', $value);
    }

    /**
     * Set height
     * 
     * @param LengthDimension $value
     * 
     * @return Dimensions
     */
    public function setHeight(LengthDimension $value)
    {
        return $this->set('Height', $value);
    }

    /**
     * Set weight
     * 
     * @param WeightDimension $value
     * 
     * @return Dimensions 
     */
    public function setWeight(WeightDimension $value)
    {
        return $this->set('Weight', $value);
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
        if ($weight = $this->get('Weight')) {
            $weight->writeXml($xml, 'Weight');
        }
        $xml->endElement();
    }

}