<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * Battery data type
 * 
 * Used for specifying product batteries
 * 
 * Example:
 * <Battery>
 *   <AreBatteriesIncluded>true</AreBatteriesIncluded>
 *   <AreBatteriesRequired>true</AreBatteriesRequired>
 *   <BatteryType>battery_type_aa</BatteryType>
 *   <NumberOfBatteries>2</NumberOfBatteries>
 * </Battery>
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class Battery extends AbstractDataType
{

    /**
     * Init object
     * 
     * @param bool $areBatteriesIncluded
     * @param bool $areBatteriesRequired
     * @param string $batteryType
     * @param int $numberOfBatteries 
     */
    public function __construct($areBatteriesIncluded = null, $areBatteriesRequired = null, $batteryType = null, $numberOfBatteries = null)
    {
        if ($areBatteriesIncluded !== null) {
            $this->setAreBatteriesIncluded($areBatteriesIncluded);
        }
        if ($areBatteriesRequired !== null) {
            $this->setAreBatteriesRequired($areBatteriesRequired);
        }
        if ($batteryType !== null) {
            $this->setBatteryType($batteryType);
        }
        if ($numberOfBatteries !== null) {
            $this->setNumberOfBatteries($numberOfBatteries);
        }
    }

    /**
     * @param bool $value
     * 
     * @return Battery 
     */
    public function setAreBatteriesIncluded($value)
    {
        return $this->set('AreBatteriesIncluded', (bool) $value);
    }

    /**
     * @param bool $value
     * 
     * @return Battery
     */
    public function setAreBatteriesRequired($value)
    {
        return $this->set('AreBatteriesRequired', (bool) $value);
    }

    /**
     * @param string $value
     * 
     * @return Battery
     */
    public function setBatteryType($value)
    {
        if (!in_array($value, array(
                'battery_type_2/3A',
                'battery_type_3/4A',
                'battery_type_4/5A',
                'battery_type_9v',
                'battery_type_12v',
                'battery_type_a',
                'battery_type_a76',
                'battery_type_aa',
                'battery_type_aaa',
                'battery_type_aaaa',
                'battery_type_c',
                'battery_type_cr123a',
                'battery_type_cr2',
                'battery_type_cr5',
                'battery_type_d',
                'battery_type_lithium_ion',
                'battery_type_lithium_metal',
                'battery_type_L-SC',
                'battery_type_p76',
                'battery_type_product_specific',
                'battery_type_SC'
            ))) {
            throw new \InvalidArgumentException('Invalid battery type');
        }

        return $this->set('BatteryType', $value);
    }

    /**
     * @param int $value
     * 
     * @return Battery
     */
    public function setNumberOfBatteries($value)
    {
        return $this->set('NumberOfBatteries', $value);
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
        if ($val = $this->get('AreBatteriesIncluded')) {
            $xml->writeElement('AreBatteriesIncluded', $val ? 'true' : 'false');
        }
        if ($val = $this->get('AreBatteriesRequired')) {
            $xml->writeElement('AreBatteriesRequired', $val ? 'true' : 'false');
        }
        $type = $this->get('BatteryType');
        $num = $this->get('NumberOfBatteries');
        if ($type || $num) {
            $xml->startElement('BatterySubgroup');
            if ($type) {
                $xml->writeElement('BatteryType', $type);
            }
            if ($num) {
                $xml->writeElement('NumberOfBatteries', $num);
            }
            $xml->endElement();
        }
        $xml->endElement();
    }

}