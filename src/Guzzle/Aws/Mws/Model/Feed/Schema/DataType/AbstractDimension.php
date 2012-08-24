<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * Base class for all data types which express a dimension
 * through value and unitOfMeasure (Length, Weight, etc)
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
abstract class AbstractDimension extends AbstractDataType
{

    /**
     * @var array allowed values for unitOfMeasure
     */
    protected $unitsOfMeasure = array();

    /**
     * Init object
     * 
     * @param float $value
     * @param string $unitOfMeasure 
     */
    public function __construct($value = null, $unitOfMeasure = null)
    {
        if ($value !== null && $value !== '') {
            $this->setValue($value);
        }
        if ($unitOfMeasure !== null && $value !== '') {
            $this->setUnitOfMeasure($unitOfMeasure);
        }
    }

    /**
     * Set value
     * 
     * @param float $value
     * 
     * @return AbstractDimension 
     */
    public function setValue($value)
    {
        return $this->set('value', $value);
    }

    /**
     * Set length unit of measure
     * 
     * @param string $value
     * 
     * @return AbstractDimension 
     */
    public function setUnitOfMeasure($value)
    {
        if (!in_array($value, $this->unitsOfMeasure)) {
            throw new \InvalidArgumentException('Invalid unit of measure');
        }
        return $this->set('unitOfMeasure', $value);
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
        if ($unit = $this->get('unitOfMeasure')) {
            $xml->writeAttribute('unitOfMeasure', $unit);
        }
        $xml->text($this->get('value'));
        $xml->endElement();
    }

}