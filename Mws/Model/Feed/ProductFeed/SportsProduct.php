<?php

namespace Guzzle\Aws\Mws\Model\Feed\ProductFeed;

use Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * Sports product feed item
 * 
 * Represents a Sports product
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class SportsProduct extends AbstractProduct
{

    /**
     * @param string $value
     * 
     * @return SportsProduct 
     */
    public function setProductType($value)
    {
        if (!in_array($value, array(
                'SportingGoods',
                'GolfClubHybrid',
                'GolfClubIron',
                'GolfClubPutter',
                'GlofClubWedge',
                'GolfClubWood',
                'GolfClubs'
            ))) {
            throw new \InvalidArgumentException('Invalid product type');
        }

        return $this->set('ProductType', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setParentage($value)
    {
        if (!in_array($value, array('parent', 'child'))) {
            throw new \InvalidArgumentException('Invalid parentage');
        }

        return $this->set('Parentage', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct 
     */
    public function setVariationTheme($value)
    {
        if (!in_array($value, array(
                'AgeGenderCategory',
                'Amperage',
                'BikeRimSize',
                'BikeRimSizeMaterial',
                'BootSize',
                'BootSizeCalfSize',
                'CalfSize',
                'Caliber',
                'CaliberRounds',
                'Capacity',
                'Color',
                'ColorDesign',
                'ColorFlavor',
                'ColorItemThickness',
                'ColorLength',
                'ColorLensColor',
                'ColorQuantity',
                'ColorRounds',
                'ColorShaftMaterial',
                'ColorShaftType',
                'ColorShape',
                'ColorSize',
                'ColorStyle',
                'ColorTensionLevel',
                'ColorWattage',
                'ColorWeight',
                'ColorWheelSize',
                'ColorWidth',
                'Curvature',
                'CurvatureHand',
                'Design',
                'DesignFlavor',
                'DesignLength',
                'DesignLensColor',
                'DesignShaftMaterial',
                'DesignShaftType',
                'DesignShape',
                'DesignSize',
                'DesignStyle',
                'DesignTensionLevel',
                'DesignWeight',
                'DesignWheelSize',
                'DesignWidth',
                'Diameter',
                'DivingHoodThickness',
                'FencingPommelType',
                'FencingPommelTypeGripType',
                'Flavor',
                'FlavorSize',
                'GolfFlex',
                'GolfFlexGolfLoft',
                'GolfFlexMaterial',
                'GolfFlexShaftMaterial',
                'GolfLoft',
                'GolfLoftShaftMaterial',
                'GripSize',
                'GripSizeGripType',
                'GripSizeHeadSize',
                'GripType',
                'Hand',
                'HandBounceGolfFlex',
                'HandBounceShaftTypeGolfFlex',
                'HandClubGolfFlext',
                'HandClubShaftTypeGolfFlex',
                'HandClubGolfFlex',
                'HandClubShaftTypeGolfFlex',
                'HandGolfFlex',
                'HandIronsGolfFlex',
                'HandIronsLieAngleGolfFlex',
                'HandIronsLieAngleShaftTypeGolfFlex',
                'HandIronsShaftTypeGolfFlex',
                'HandLength',
                'HandLieAngle',
                'HandLieAngleGolfFlex',
                'HandLieAngleLength',
                'HandLieAngleShaftType',
                'HandLieAngleShaftTypeGolfFlex',
                'HandLieAngleShaftTypeLength',
                'HandGolfLoftBounceGolfFlex',
                'HandGolfLoftBounceShaftTypeGolfFlex',
                'HandGolfLoftGolfFlex',
                'HandGolfLoftShaftTypeGolfFlex',
                'HandModel',
                'HandModelLength',
                'HandModelShaftType',
                'HandModelShaftTypeLength',
                'HandShaftLength',
                'HandShaftMaterialGolfFlex',
                'HandShaftMaterialGolfFlextGolfLoft',
                'HandShaftType',
                'HandShaftTypeGolfFlex',
                'HandShaftTypeLength',
                'HandSize',
                'HandTensionLevel',
                'HandWeight',
                'HandWoodGolfFlex',
                'HandWoodShaftTypeGolfFlex',
                'HeadSize',
                'HeadSizeShape',
                'Height',
                'HeightSize',
                'HeightStyle',
                'HeightWeight',
                'HeightWidth',
                'ItemThickness',
                'Length',
                'LengthLineCapacity',
                'LengthLineWeight',
                'LengthMaterial',
                'LengthShaftType',
                'LengthSize',
                'LengthStyle',
                'LengthWeight',
                'LengthWeightSupported',
                'LengthWidth',
                'LensColor',
                'LensColorMaterial',
                'LensColorShape',
                'LineCapacity',
                'LineCapacitySize',
                'LineCapacityWeight',
                'LineWeight',
                'LineWeightSize',
                'Material',
                'MaterialShape',
                'MaterialSize',
                'MaterialStyle',
                'MaterialTensionLevel',
                'MaterialWeight',
                'MaterialWheelSize',
                'MaterialWidth',
                'Quantity',
                'QuantityShape',
                'QuantitySize',
                'QuantityWeight',
                'Rounds',
                'RoundsSize',
                'ShaftMaterial',
                'ShaftMaterialShaftType',
                'ShaftType',
                'Shape',
                'ShapeSize',
                'ShapeTensionLevel',
                'ShapeWeight',
                'Size',
                'SizeStyle',
                'SizeTensionLevel',
                'SizeWattage',
                'SizeWeight',
                'SizeWeightSupported',
                'SizeWheelSize',
                'SizeWidth',
                'Style',
                'StyleTensionLevel',
                'StyleWeight',
                'StyleWheelSize',
                'StyleWidth',
                'TemperatureRating',
                'TemperatureRatingColor',
                'TemperatureRatingDesign',
                'TemperatureRatingHand',
                'TemperatureRatingLength',
                'TemperatureRatingMaterial',
                'TemperatureRatingShape',
                'TemperatureRatingSize',
                'TensionLevel',
                'TensionLevelWeight',
                'TensionLevelWeightSupported',
                'Wattage',
                'Weight',
                'WeightSupported',
                'WeightWidth',
                'WheelSize',
                'WheelSizeWeight',
                'Width'
            ))) {
            throw new \InvalidArgumentException('Invalid variation theme');
        }

        return $this->set('VariationTheme', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setAgeGenderCategory($value)
    {
        return $this->set('AgeGenderCategory', $value);
    }

    /**
     * @param DataType\AmperageDimension $value
     * 
     * @return SportsProduct 
     */
    public function setAmperage(DataType\AmperageDimension $value)
    {
        return $this->Set('Amperage', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return SportsProduct 
     */
    public function setBikeRimSize(DataType\LengthDimension $value)
    {
        return $this->set('BikeRimSize', $value);
    }

    /**
     * @param float $value
     * 
     * @return SportsProduct 
     */
    public function setBootSize($value)
    {
        return $this->set('BootSize', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setBounce($value)
    {
        return $this->set('Bounce', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setCalfSize($value)
    {
        return $this->set('CalfSize', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setCaliber($value)
    {
        return $this->set('Caliber', $value);
    }

    /**
     * @param DataType\VolumeDimension $value
     * '
     * @return string 
     */
    public function setCapacity(DataType\VolumeDimension $value)
    {
        return $this->set('Capacity', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setClub($value)
    {
        return $this->set('Club', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setColor($value)
    {
        return $this->set('Color', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setCurvature($value)
    {
        return $this->set('Curvature', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setDesign($value)
    {
        return $this->set('Design', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return SportsProduct 
     */
    public function setDiameter(DataType\LengthDimension $value)
    {
        return $this->set('Diameter', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return SportsProduct 
     */
    public function setDivingHoodThickness(DataType\LengthDimension $value)
    {
        return $this->set('DivingHoodThickness', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setFencingPommelType($value)
    {
        return $this->set('FencingPommelType', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setFlavor($value)
    {
        return $this->set('Flavor', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setGolfFlex($value)
    {
        return $this->set('GolfFlex', $value);
    }

    /**
     * @param DataType\DegreeDimension $value
     * 
     * @return SportsProduct 
     */
    public function setGolfLoft(DataType\DegreeDimension $value)
    {
        return $this->set('GolfLoft', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setGripSize($value)
    {
        return $this->set('GripSize', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setGripType($value)
    {
        return $this->set('GripType', $value);
    }

    /**
     * @param string $value (left or right)
     * 
     * @return SportsProduct 
     */
    public function setHand($value)
    {
        if (!in_array($value, array('left', 'right'))) {
            throw new \InvalidArgumentException('Invalid hand value');
        }

        return $this->set('Hand', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setHeadSize($value)
    {
        if (!in_array($value, array(
                'mid-plus',
                'mid-sized',
                'over-sized',
                'super-oversized'
            ))) {
            throw new \InvalidArgumentException('Invalid head size ' . $value);
        }

        return $this->set('HeadSize', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return SportsProduct 
     */
    public function setHeight(DataType\LengthDimension $value)
    {
        return $this->set('Height', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setIrons($value)
    {
        return $this->set('Irons', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return SportsProduct 
     */
    public function setItemThickness(DataType\LengthDimension $value)
    {
        return $this->set('ItemThickness', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return SportsProduct 
     */
    public function setLength(DataType\LengthDimension $value)
    {
        return $this->set('Length', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setLensColor($value)
    {
        return $this->set('LensColor', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setLieAngle($value)
    {
        return $this->set('LieAngle', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setLineCapacity($value)
    {
        return $this->set('LineCapacity', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setLineWeight($value)
    {
        return $this->set('LineWeight', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setMaterial($value)
    {
        return $this->set('Material', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setModel($value)
    {
        return $this->set('Model', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setNumberOfItems($value)
    {
        return $this->set('NumberOfItems', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setQuantity($value)
    {
        return $this->set('Quantity', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setRounds($value)
    {
        return $this->set('Rounds', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return SportsProduct 
     */
    public function setShaftLength(DataType\LengthDimension $value)
    {
        return $this->set('ShaftLength', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setShaftMaterial($value)
    {
        return $this->set('ShaftMaterial', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setShaftType($value)
    {
        if (!in_array($value, array(
                'attacker-shafts',
                'defender-shafts',
                'goalie-shafts',
                'midfielder-shafts'
            ))) {
            throw new \InvalidArgumentException('Invalid shaft type');
        }

        return $this->set('ShaftType', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setShape($value)
    {
        return $this->set('Shape', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setSize($value)
    {
        return $this->set('Size', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setStyle($value)
    {
        return $this->set('Style', $value);
    }

    /**
     * @param DataType\TemperatureRatingDimension $value
     * 
     * @return string 
     */
    public function setTemperatureRating(DataType\TemperatureRatingDimension $value)
    {
        return $this->set('TemperatureRating', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct
     */
    public function setTensionLevel($value)
    {
        return $this->set('TensionLevel', $value);
    }

    /**
     * @param DataType\VolumeDimension $value
     * 
     * @return SportsProduct 
     */
    public function setVolume(DataType\VolumeDimension $value)
    {
        return $this->set('Volume', $value);
    }

    /**
     * @param DataType\WattageDimension $value
     * 
     * @return SportsProduct 
     */
    public function setWattage(DataType\WattageDimension $value)
    {
        return $this->set('Wattage', $value);
    }

    /**
     * @param DataType\WeightDimension $value
     * 
     * @return SportsProduct 
     */
    public function setWeight(DataType\WeightDimension $value)
    {
        return $this->set('Weight', $value);
    }

    /**
     * @param DataType\WeightDimension $value
     * 
     * @return SportsProduct 
     */
    public function setWeightSupported(DataType\WeightDimension $value)
    {
        return $this->set('WeightSupported', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return SportsProduct 
     */
    public function setWheelSize(DataType\LengthDimension $value)
    {
        return $this->set('WheelSize', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return SportsProduct 
     */
    public function setWidth(DataType\LengthDimension $value)
    {
        return $this->set('Width', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct 
     */
    public function setWood($value)
    {
        return $this->set('Wood', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct 
     */
    public function setPackaging($value)
    {
        return $this->set('Packaging', $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct 
     */
    public function setIsCustomizable($value)
    {
        return $this->set('IsCustomizable', (bool) $value);
    }

    /**
     * @param string $value
     * 
     * @return SportsProduct 
     */
    public function setIsAdultProduct($value)
    {
        return $this->set('IsAdultProduct', (bool) $value);
    }

    /**
     * Write XML output
     */
    public function writeXml()
    {
        $this->xml->startElement('Product');

        parent::writeXml();

        $this->xml->startElement('ProductData');
        $this->xml->startElement('Sports');

        $this->writeNode('ProductType');

        $this->xml->startElement('VariationData');
        $this
            ->writeNode('Parentage')
            ->writeNode('VariationTheme')
            ->writeNode('AgeGenderCategory')
            ->writeNode('Amperage')
            ->writeNode('BikeRimSize')
            ->writeNode('BootSize')
            ->writeNode('Bounce')
            ->writeNode('CalfSize')
            ->writeNode('Caliber')
            ->writeNode('Capacity')
            ->writeNode('Club')
            ->writeNode('Color')
            ->writeNode('Curvature')
            ->writeNode('Design')
            ->writeNode('Diameter')
            ->writeNode('DivingHoodThickness')
            ->writeNode('FencingPommelType')
            ->writeNode('Flavor')
            ->writeNode('GolfFlex')
            ->writeNode('GolfLoft')
            ->writeNode('GripSize')
            ->writeNode('GripType')
            ->writeNode('Hand')
            ->writeNode('HeadSize')
            ->writeNode('Height')
            ->writeNode('Irons')
            ->writeNode('ItemThickness')
            ->writeNode('Length')
            ->writeNode('LensColor')
            ->writeNode('LieAngle')
            ->writeNode('LineCapacity')
            ->writeNode('LineWeight')
            ->writeNode('Material')
            ->writeNode('Model')
            ->writeNode('NumberOfItems')
            ->writeNode('Quantity')
            ->writeNode('Rounds')
            ->writeNode('ShaftLength')
            ->writeNode('ShaftMaterial')
            ->writeNode('ShaftType')
            ->writeNode('Shape')
            ->writeNode('Size')
            ->writeNode('Style')
            ->writeNode('TemperatureRating')
            ->writeNode('TensionLevel')
            ->writeNode('Volume')
            ->writeNode('Wattage')
            ->writeNode('Weight')
            ->writeNode('WeightSupported')
            ->writeNode('WheelSize')
            ->writeNode('Width')
            ->writeNode('Wood');
        $this->xml->endElement(); // end VariationData
        // Misc
        $this
            ->writeNode('Packaging')
            ->writeNode('IsCustomizable')
            ->writeNode('IsAdultProduct');

        $this->xml->endElement(); // end Sports
        $this->xml->endElement(); // end ProductData
        $this->xml->endElement(); // end Product
    }

}