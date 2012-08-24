<?php

namespace Guzzle\Aws\Mws\Model\Feed\ProductFeed;

use Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * Clothing product feed item
 * 
 * Represents a Clothing product
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class ClothingProduct extends AbstractProduct
{

    /**
     * @param string $value (parent or child)
     * 
     * @return ClothingProduct 
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
     * @return ClothingProduct
     */
    public function setSize($value)
    {
        return $this->set('Size', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setColor($value)
    {
        return $this->set('Color', $value);
    }

    /**
     * @param string $value (Size, Color, or SizeColor)
     * 
     * @return ClothingProduct
     */
    public function setVariationTheme($value)
    {
        if (!in_array($value, array('Size', 'Color', 'SizeColor'))) {
            throw new \InvalidArgumentException('Invalid variation theme');
        }

        return $this->set('VariationTheme', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setClothingType($value)
    {
        if (!in_array($value, array(
                'Shirt',
                'Sweater',
                'Pants',
                'Shorts',
                'Skirt',
                'Dress',
                'Suit',
                'Blazer',
                'Outerwear',
                'SocksHosiery',
                'Underwear',
                'Bra',
                'Shoes',
                'Hat',
                'Bag',
                'Accessory',
                'Jewelry',
                'Sleepwear',
                'Swimwear',
                'PersonalBodyCare',
                'HomeAccessory',
                'NonApparelMisc',
                'Kimono',
                'Obi',
                'Chanchanko',
                'Jinbei',
                'Yukata'
            ))) {
            throw new \InvalidArgumentException('Invalid clothing type');
        }

        return $this->set('ClothingType', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function addDepartment($value)
    {
        return $this->add('Department', $value, 10);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct 
     */
    public function addStyleKeywords($value)
    {
        return $this->add('StyleKeywords', $value, 10);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setColorMap($value)
    {
        return $this->set('ColorMap', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function addSpecialSizeType($value)
    {
        return $this->set('SpecialSizeType', $value, 10);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function addMaterialAndFabric($value)
    {
        return $this->set('MaterialAndFabric', $value, 4);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct 
     */
    public function setMaterialComposition($value)
    {
        return $this->set('MaterialComposition', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setMaterialOpacity($value)
    {
        return $this->set('MaterialOpacity', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setInnerMaterial($value)
    {
        return $this->set('InnerMaterial', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setOuterMaterial($value)
    {
        return $this->set('OuterMaterial', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setSoleMaterial($value)
    {
        return $this->set('SoleMaterial', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setShoeClosureType($value)
    {
        return $this->set('ShoeClosureType', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setApparelClosureType($value)
    {
        return $this->set('ApparelClosureType', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setCareInstructions($value)
    {
        return $this->set('CareInstructions', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function addOccasionAndLifestyle($value)
    {
        return $this->add('OccasionAndLifestyle', $value, 10);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct 
     */
    public function addEventKeywords($value)
    {
        return $this->add('EventKeywords', $value, 10);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setSeason($value)
    {
        return $this->set('Season', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function addSpecificUses($value)
    {
        return $this->add('SpecificUses', $value, 3);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function addExternalTestingCertification($value)
    {
        return $this->add('ExternalTestingCertification', $value, 5);
    }

    /**
     * @param string $value (Sunproof, Waterproof, Weatherproof, or Windproof)
     * 
     * @return ClothingProduct
     */
    public function addPerformanceRating($value)
    {
        if (!in_array($value, array(
                'Sunproof',
                'Waterproof',
                'Weatherproof',
                'Windproof'
            ))) {
            throw new \InvalidArgumentException('Invalid performance rating');
        }

        return $this->add('PerformanceRating', $value, 3);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setProductSpecification($value)
    {
        return $this->set('ProductSpecification', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setWarnings($value)
    {
        return $this->set('Warnings', $value);
    }

    /**
     * @param bool $value
     * 
     * @return ClothingProduct 
     */
    public function setIsCustomizable($value)
    {
        return $this->set('IsCustomizable', (bool) $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setStyleName($value)
    {
        return $this->set('StyleName', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setCollarType($value)
    {
        return $this->set('CollarType', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setSleeveType($value)
    {
        return $this->set('SleeveType', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct 
     */
    public function setWaistStyle($value)
    {
        return $this->set('WaistStyle', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return ClothingProduct 
     */
    public function setMinimumHeightRecommended(DataType\LengthDimension $value)
    {
        return $this->set('MinimumHeightRecommended', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return ClothingProduct 
     */
    public function setMaximumHeightRecommended(DataType\LengthDimension $value)
    {
        return $this->set('MaximumHeightRecommended', $value);
    }

    /**
     * @param string $value (2-char country code)
     * 
     * @return ClothingProduct
     */
    public function setCountryOfOrigin($value)
    {
        if (strlen($value) != 2) {
            throw new \InvalidArgumentException('Invalid country code');
        }

        return $this->set('CountryOfOrigin', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setModelName($value)
    {
        return $this->set('ModelName', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setModelNumber($value)
    {
        return $this->set('ModelNumber', $value);
    }

    /**
     * @param int $value (four-digit year)
     * 
     * @return ClothingProduct
     */
    public function setModelYear($value)
    {
        return $this->set('ModelYear', $value);
    }

    /**
     * @param bool $value
     * 
     * @return ClothingProduct
     */
    public function setIsAdultProduct($value)
    {
        return $this->set('IsAdultProduct', (bool) $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setSizeMap($value)
    {
        return $this->set('SizeMap', $value);
    }

    /**
     * @param DataType\ClothingSizeDimension $value
     * 
     * @return ClothingProduct 
     */
    public function setWaistSize(DataType\ClothingSizeDimension $value)
    {
        return $this->set('WaistSize', $value);
    }

    /**
     * @param DataType\ClothingSizeDimension $value
     * 
     * @return ClothingProduct 
     */
    public function setInseamLength(DataType\ClothingSizeDimension $value)
    {
        return $this->set('InseamLength', $value);
    }

    /**
     * @param DataType\ClothingSizeDimension $value
     * 
     * @return ClothingProduct 
     */
    public function setSleeveLength(DataType\ClothingSizeDimension $value)
    {
        return $this->set('SleeveLength', $value);
    }

    /**
     * @param DataType\ClothingSizeDimension $value
     * 
     * @return ClothingProduct 
     */
    public function setNeckSize(DataType\ClothingSizeDimension $value)
    {
        return $this->set('NeckSize', $value);
    }

    /**
     * @param DataType\ClothingSizeDimension $value
     * 
     * @return ClothingProduct 
     */
    public function setChestSize(DataType\ClothingSizeDimension $value)
    {
        return $this->set('ChestSize', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setCupSize($value)
    {
        if (!in_array($value, array(
                'A', 'AA', 'B', 'C', 'D', 'DD', 'DDD', 'E', 'EE', 'F', 'FF', 'G', 'GG', 'H', 'I', 'J', 'Free'
            ))) {
            throw new \InvalidArgumentException('Invalid cup size');
        }

        return $this->set('CupSize', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return ClothingProduct 
     */
    public function setBraBandSize(DataType\LengthDimension $value)
    {
        return $this->set('BraBandSize', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setShoeWidth($value)
    {
        if (!in_array($value, array(
                'AAAA', 'AAA', 'AA', 'A', 'B', 'C', 'D', 'E', 'EE', 'EEE', 'EEEE', 'EEEEE', 'F', 'G'
            ))) {
            throw new \InvalidArgumentException('Invalid shoe width');
        }

        return $this->set('ShoeWidth', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return ClothingProduct 
     */
    public function setHeelHeight(DataType\LengthDimension $value)
    {
        return $this->set('HeelHeight', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setShaftDiameter($value)
    {
        return $this->set('ShaftDiameter', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return ClothingProduct 
     */
    public function setBeltLength(DataType\LengthDimension $value)
    {
        return $this->set('BeltLength', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return ClothingProduct 
     */
    public function setBeltWidth(DataType\LengthDimension $value)
    {
        return $this->set('BelthWidth', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return ClothingProduct 
     */
    public function setFurisodeLength(DataType\LengthDimension $value)
    {
        return $this->set('FurisodeLength', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return ClothingProduct 
     */
    public function setFurisodeWidth(DataType\LengthDimension $value)
    {
        return $this->set('FurisodeWidth', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return ClothingProduct 
     */
    public function setObiLength(DataType\LengthDimension $value)
    {
        return $this->set('ObiLength', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return ClothingProduct 
     */
    public function setObiWidth(DataType\LengthDimension $value)
    {
        return $this->set('ObiWidth', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return ClothingProduct 
     */
    public function setTsukeobiWidth(DataType\LengthDimension $value)
    {
        return $this->set('TsukeobiWidth', $value);
    }

    /**
     * @param DataType\LengthDimension $value
     * 
     * @return ClothingProduct 
     */
    public function setTsukeobiHeight(DataType\LengthDimension $value)
    {
        return $this->set('TsukeobiHeight', $value);
    }

    /**
     * @param string $value
     * 
     * @return ClothingProduct
     */
    public function setPillowSize($value)
    {
        return $this->seT('PillowSize', $value);
    }

    /**
     * Write XML output
     * 
     * @return ClothingProduct
     */
    public function writeXml()
    {
        $this->xml->startElement('Product');

        parent::writeXml();

        $this->xml->startElement('ProductData');
        $this->xml->startElement('Clothing');

        $this->xml->startElement('VariationData');
        $this
            ->writeNode('Parentage')
            ->writeNode('Size')
            ->writeNode('Color')
            ->writeNode('VariationTheme');
        $this->xml->endElement();

        $this->xml->startElement('ClassificationData');
        $this
            ->writeNode('ClothingType')
            ->writeNode('Department')
            ->writeNode('StyleKeywords')
            ->writeNode('PlatinumKeywords')
            ->writeNode('ColorMap')
            ->writeNode('SpecialSizeType')
            ->writeNode('MaterialAndFabric')
            ->writeNode('MaterialComposition')
            ->writeNode('MaterialOpacity')
            ->writeNode('InnerMaterial')
            ->writeNode('OuterMaterial')
            ->writeNode('SoleMaterial')
            ->writeNode('ShoeClosureType')
            ->writeNode('CareInstructions')
            ->writeNode('OccasionAndLifestyle')
            ->writeNode('EventKeywords')
            ->writeNode('Season')
            ->writeNode('SpecificUses')
            ->writeNode('ExternalTestingCertification')
            ->writeNode('PerformanceRating')
            ->writeNode('ProductSpecification')
            ->writeNode('Warnings')
            ->writeNode('IsCustomizable')
            ->writeNode('StyleName')
            ->writeNode('CollarType')
            ->writeNode('SleeveType')
            ->writeNode('WaistStyle')
            ->writeNode('MinimumHeightRecommended')
            ->writeNode('MaximumHeightRecommended')
            ->writeNode('CountryOfOrigin')
            ->writeNode('ModelName')
            ->writeNode('ModelNumber')
            ->writeNode('ModelYear')
            ->writeNode('IsAdultProduct')
            ->writeNode('SizeMap')
            ->writeNode('WaistSize')
            ->writeNode('InseamLength')
            ->writeNode('SleeveLength')
            ->writeNode('NeckSize')
            ->writeNode('ChestSize')
            ->writeNode('CupSize')
            ->writeNode('BraBandSize')
            ->writeNode('ShoeWidth')
            ->writeNode('HeelHeight')
            ->writeNode('HeelType')
            ->writeNode('ShaftHeight')
            ->writeNode('ShaftDiameter')
            ->writeNode('BeltLength')
            ->writeNode('BeltWidth')
            ->writeNode('FurisodeLength')
            ->writeNode('FurisodeWidth')
            ->writeNode('ObiLength')
            ->writeNode('ObiWidth')
            ->writeNode('TsukeobiWidth')
            ->writeNode('TsukeobiHeight')
            ->writeNode('PillowSize');
        $this->xml->endElement();

        $this->xml->endElement(); // End Clothing
        $this->xml->endElement(); // End ProductData
        $this->xml->endElement(); // End Product
    }

}