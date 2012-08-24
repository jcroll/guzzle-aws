<?php

namespace Guzzle\Aws\Mws\Model\Feed\ProductFeed;

use Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

class JewelryWatchProduct extends AbstractProduct
{

    /**
     * @param string $value parent or child
     * 
     * @return JewelryWatchProduct 
     */
    public function setParentage($value)
    {
        if (!in_array($value, array('parent', 'child'))) {
            throw new \InvalidArgumentException('Invalid parentage value');
        }

        return $this->set('Parentage', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct
     */
    public function setVariationTheme($value)
    {
        if (!in_array($value, array(
                'BandColor'
            ))) {
            throw new \InvalidArgumentException('Invalid variation theme');
        }

        return $this->set('VariationTheme', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct
     */
    public function setBandColor($value)
    {
        return $this->set('BandColor', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct
     */
    public function setBandMaterial($value)
    {
        return $this->set('BandMaterial', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct
     */
    public function setBandLength($value)
    {
        return $this->set('BandLength', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setBandWidth(DataType\LengthDimension $value)
    {
        return $this->set('BandWidth', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setClaspType($value)
    {
        return $this->set('ClaspType', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct
     */
    public function setCaseMaterial($value)
    {
        return $this->set('CaseMaterial', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setCaseSizeThickness(DataType\LengthDimension $value)
    {
        return $this->set('CaseSizeThickness', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setCaseSizeDiameter(DataType\LengthDimension $value)
    {
        return $this->set('CaseSizeDiameter', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setMetalStamp($value)
    {
        return $this->set('MetalStamp', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setDialColor($value)
    {
        return $this->set('DialColor', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setDialColorMap($value)
    {
        return $this->set('DialColorMap', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct
     */
    public function setBezelMaterial($value)
    {
        return $this->set('BezelMaterial', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setGemType($value)
    {
        return $this->set('GemType', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setCrystal($value)
    {
        return $this->set('Crystal', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setMovementType($value)
    {
        return $this->set('MovementType', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setCalendarType($value)
    {
        return $this->set('CalendarType', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setWaterResistantDepth(DataType\LengthDimension $value)
    {
        return $this->set('WaterResistantDepth', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setResaleType($value)
    {
        return $this->set('ResaleType', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setWarrantyType($value)
    {
        return $this->set('WarrantyType', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setSellerWarrantyDescription($value)
    {
        return $this->set('SellerWarrantyDescription', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setEstatePeriod($value)
    {
        return $this->set('EstatePeriod', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setCountryOfOrigin($value)
    {
        if (!preg_match('#^[A-Za-z]{2}$#', $value)) {
            throw new \InvalidArgumentException('Invalid country code');
        }

        return $this->set('CountryOfOrigin', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setItemShape($value)
    {
        return $this->set('ItemShape', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setSpecialFeatures($value)
    {
        return $this->set('SpecialFeatures', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setDisplayType($value)
    {
        return $this->set('DisplayType', $value);
    }

    /**
     * @param DataType\PressureDimension $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setMaximumWaterPressure(DataType\PressureDimension $value)
    {
        return $this->set('MaximumWaterPressure', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setModelYear($value)
    {
        if (!preg_match('#^[\d]{4}$#', $value)) {
            throw new \InvalidArgumentException('Invalid model year');
        }

        return $this->set('ModelYear', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setSeason($value)
    {
        return $this->set('Season', $value);
    }

    /**
     * @param int $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setBatteryTypeLithiumIon($value)
    {
        return $this->set('BatteryTypeLithiumIon', $value);
    }

    /**
     * @param int $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setBatteryTypeLithiumMetal($value)
    {
        return $this->set('BatteryTypeLithiumMetal', $value);
    }

    /**
     * @param float $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setLithiumBatteryEnergyContent($value)
    {
        return $this->set('LithiumBatteryEnergyContent', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setLithiumBatteryPackaging($value)
    {
        if (!in_array($value, array(
                'batteries_contained_in_equipment',
                'batteries_only',
                'batteries_packed_with_equipment'
            ))) {
            throw new \InvalidArgumentException('Invalid battery packaging');
        }

        return $this->set('LithiumBatteryPackaging', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setLithiumBatteryVoltage($value)
    {
        return $this->set('LithiumBatteryVoltage', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setLithiumBatteryWeight($value)
    {
        return $this->set('LithiumBatteryWeight', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setNumberOfLithiumIonCells($value)
    {
        return $this->set('NumberOfLithiumIonCells', $value);
    }

    /**
     * @param string $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setNumberOfLithiumMetalCells($value)
    {
        return $this->set('NumberOfLithiumMetalCells', $value);
    }

    /**
     * @param DataTyle\Battery $value
     * 
     * @return JewelryWatchProduct 
     */
    public function setBattery(DataType\Battery $value)
    {
        return $this->set('Battery', $value);
    }

    /**
     * Build XML output
     */
    public function writeXml()
    {
        $this->xml->startElement('Product');

        parent::writeXml();

        $this->xml->startElement('ProductData');
        $this->xml->startElement('Jewelry');
        $this->xml->startElement('ProductType');
        $this->xml->startElement('Watch');

        $this->xml->startElement('VariationData');
        $this
            ->writeNode('Parentage')
            ->writeNode('VariationTheme');
        $this->xml->endElement();

        $this
            ->writeNode('BandColor')
            ->writeNode('BandMaterial')
            ->writeNode('BandLength')
            ->writeNode('BandWidth')
            ->writeNode('ClaspType')
            ->writeNode('CaseMaterial')
            ->writeNode('CaseSizeThickness')
            ->writeNode('CaseSizeDiameter')
            ->writeNode('MetalStamp')
            ->writeNode('DialColor')
            ->writeNode('DialColorMap')
            ->writeNode('BezelMaterial')
            ->writeNode('BezelFunction')
            ->writeNode('GemType')
            ->writeNode('Crystal')
            ->writeNode('MovementType')
            ->writeNode('CalendarType')
            ->writeNode('WaterResistantDepth')
            ->writeNode('ResaleType')
            ->writeNode('WarrantyType')
            ->writeNode('SellerWarrantyDescription')
            ->writeNode('EstatePeriod')
            ->writeNode('CountryOfOrigin')
            ->writeNode('ItemShape')
            ->writeNode('SpecialFeatures')
            ->writeNode('DisplayType')
            ->writeNode('MaximumWaterPressure')
            ->writeNode('ModelYear')
            ->writeNode('Season')
            ->writeNode('BatteryTypeLithiumIon')
            ->writeNode('BatteryTypeLithiumMetal')
            ->writeNode('LithiumBatteryEnergyContent')
            ->writeNode('LithiumBatteryPackaging')
            ->writeNode('NumberOfLithiumIonCells')
            ->writeNode('NumberOfLithiumMetalCells')
            ->writeNode('Battery');

        $this->xml->endElement(); // end Watch
        $this->xml->endElement(); // end ProductType
        $this->xml->endElement(); // end Jewelry
        $this->xml->endElement(); // end ProductData
        $this->xml->endElement(); // end Product
    }

}