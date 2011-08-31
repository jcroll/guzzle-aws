<?php

namespace Guzzle\Aws\Mws\Model\Feed\ProductFeed;

use Guzzle\Aws\Mws\Model\Feed\AbstractFeedItem;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * Product node base class
 * 
 * All category-specific product classes inherit from this class
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
abstract class AbstractProduct extends AbstractFeedItem
{

    /**
     * Set sku
     * 
     * @param string $value
     * 
     * @return AbstractProduct 
     */
    public function setSku($value)
    {
        return $this->set('SKU', $value);
    }

    /**
     * @param DataType\StandardProductId $productId
     * 
     * @return AbstractProduct 
     */
    public function setStandardProductId(DataType\StandardProductId $productId)
    {
        return $this->set('StandardProductID', $productId);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct 
     */
    public function setProductTaxCode($value)
    {
        return $this->set('ProductTaxCode', $value);
    }

    /**
     * @param \DateTime $value
     * 
     * @return AbstractProduct 
     */
    public function setLaunchDate(\DateTime $value)
    {
        return $this->set('LaunchDate', $value);
    }

    /**
     * @param \DateTime $value
     * 
     * @return AbstractProduct 
     */
    public function setDiscontinueDate(\DateTime $value)
    {
        return $this->set('DiscontinueDate', $value);
    }

    /**
     * @param \DateTime $value
     * 
     * @return AbstractProduct 
     */
    public function setReleaseDate(\DateTime $value)
    {
        return $this->set('ReleaseDate', $value);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct 
     */
    public function setCondition(DataType\ConditionInfo $value)
    {
        return $this->set('Condition', $value);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct 
     */
    public function addRebate($value)
    {
        return $this->add('Rebate', $value, 2);
    }

    /**
     * @param int $value
     * 
     * @return AbstractProduct 
     */
    public function setItemPackageQuantity($value)
    {
        return $this->set('ItemPackageQuantity', $value);
    }

    /**
     * @param int $value
     * 
     * @return AbstractProduct 
     */
    public function setNumberOfItems($value)
    {
        return $this->set('NumberOfItems', $value);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct 
     */
    public function setTitle($value)
    {
        return $this->set('Title', $value);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct
     */
    public function setBrand($value)
    {
        return $this->set('Brand', $value);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct 
     */
    public function setDesigner($value)
    {
        return $this->set('Designer', $value);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct
     */
    public function setDescription($value)
    {
        return $this->set('Description', $value);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct 
     */
    public function addBulletPoint($value)
    {
        return $this->add('BulletPoint', $value, 5);
    }

    /**
     * @param DataType\Dimensions $dimensions
     * 
     * @return AbstractProduct 
     */
    public function setItemDimensions(DataType\Dimensions $dimensions)
    {
        return $this->set('ItemDimensions', $dimensions);
    }

    /**
     * @param DataType\SpatialDimensions $packageDimensions
     * 
     * @return AbstractProduct 
     */
    public function setPackageDimensions(DataType\SpatialDimensions $packageDimensions)
    {
        return $this->set('PackageDimensions', $packageDimensions);
    }

    /**
     * @param DataType\WeightDimension $weight
     * 
     * @return AbstractProduct 
     */
    public function setPackageWeight(DataType\WeightDimension $weight)
    {
        return $this->set('PackageWeight', $weight);
    }

    /**
     * @param DataType\WeightDimension $weight
     * 
     * @return AbstractProduct 
     */
    public function setShippingWeight(DataType\WeightDimension $weight)
    {
        return $this->set('ShippingWeight', $weight);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct
     */
    public function setMerchantCatalogNumber($value)
    {
        return $this->set('MerchantCatalogNumber', $value);
    }

    /**
     * @param DataType\CurrencyAmount $value
     * 
     * @return AbstractProduct 
     */
    public function setMsrp(DataType\CurrencyAmount $value)
    {
        return $this->set('MSRP', $value);
    }

    /**
     * @param int $value
     * 
     * @return AbstractProduct
     */
    public function setMaxOrderQuantity($value)
    {
        return $this->set('MaxOrderQuantity', $value);
    }

    /**
     * @param bool $value
     * 
     * @return AbstractProduct 
     */
    public function setSerialNumberRequired($value)
    {
        return $this->set('SerialNumberRequired', (bool) $value);
    }

    /**
     * @param bool $value
     * 
     * @return AbstractProduct
     */
    public function setProp65($value)
    {
        return $this->set('Prop65', (bool) $value);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct
     */
    public function addCPSIAWarning($value)
    {
        if (!in_array($value, array(
                'choking_hazard_balloon',
                'choking_hazard_contains_a_marble',
                'choking_hazard_contains_small_ball' .
                'choking_hazard_is_a_marble',
                'choking_hazard_is_a_small_ball',
                'choking_hazard_small_parts',
                'no_warning_applicable'
            ))) {
            throw new \InvalidArgumentException('Invalid value for CPSIAWarning');
        }

        return $this->add('CPSIAWarning', $value, 4);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct
     */
    public function setCPSIAWarningDescription($value)
    {
        return $this->set('CPSIAWarningDescription', $value);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct
     */
    public function setLegalDisclaimer($value)
    {
        return $this->set('LegalDisclaimer', $value);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct
     */
    public function setManufacturer($value)
    {
        return $this->set('Manufacturer', $value);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct
     */
    public function setMfrPartNumber($value)
    {
        return $this->set('MfrPartNumber', $value);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct
     */
    public function addSearchTerms($value)
    {
        return $this->add('SearchTerms', $value, 5);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct
     */
    public function addPlatinumKeywords($value)
    {
        return $this->add('PlatinumKeywords', $value, 20);
    }

    /**
     * @param bool $value
     * 
     * @return AbstractProduct
     */
    public function setMemorabilia($value)
    {
        return $this->set('Memorabilia', (bool) $value);
    }

    /**
     * @param bool $value
     * 
     * @return AbstractProduct
     */
    public function setAutographed($value)
    {
        return $this->set('Autographed', (bool) $value);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct
     */
    public function addUsedFor($value)
    {
        return $this->add('UsedFor', $value, 5);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct 
     */
    public function setItemType($value)
    {
        return $this->set('ItemType', $value);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct
     */
    public function addOtherItemAttributes($value)
    {
        return $this->add('OtherItemAttributes', $value, 5);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct
     */
    public function addTargetAudience($value)
    {
        return $this->add('TargetAudience', $value, 3);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct
     */
    public function addSubjectContent($value)
    {
        return $this->add('SubjectContent', $value, 5);
    }

    /**
     * @param bool $value
     * 
     * @return AbstractProduct
     */
    public function setIsGiftWrapAvailable($value)
    {
        return $this->set('IsGiftWrapAvailable', (bool) $value);
    }

    /**
     * @param bool $value
     * 
     * @return AbstractProduct 
     */
    public function setIsGiftMessageAvailable($value)
    {
        return $this->set('IsGiftMessageAvailable', (bool) $value);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct
     */
    public function addPromotionKeywords($value)
    {
        return $this->add('PromotionKeywords', $value, 10);
    }

    /**
     * @param bool $value
     * 
     * @return AbstractProduct 
     */
    public function setIsDiscontinuedByManufacturer($value)
    {
        return $this->set('IsDiscontinuedByManufacturer', $value);
    }

    /**
     * @param string $value
     * 
     * @return AbstractProduct
     */
    public function setDeliveryChannel($value)
    {
        if (!in_array($value, array(
                'in_store',
                'direct_ship'
            ))) {
            throw new \InvalidArgumentException('Invalid delivery channel');
        }

        return $this->set('DeliveryChannel', $value);
    }

    /**
     * @param int $value
     * 
     * @return AbstractProduct 
     */
    public function setMaxAggregateShipQuantity($value)
    {
        return $this->set('MaxAggregateShipQuantity', $value);
    }

    /**
     * @param int $value
     * 
     * @return AbstractProduct 
     */
    public function setPriority($value)
    {
        if ($value < 1 || $value > 10) {
            throw new \InvalidArgumentException('Invalid priority');
        }

        return $this->set('Priority', $value);
    }

    /**
     * @param bool $value
     * 
     * @return AbstractProduct
     */
    public function setBrowseExclusion($value)
    {
        return $this->set('BrowseExclusion', (bool) $value);
    }

    /**
     * @param bool $value
     * 
     * @return AbstractProduct
     */
    public function setRecommendationExclusion($value)
    {
        return $this->set('RecommendationExclusion', (bool) $value);
    }

    /**
     * Build XML output
     */
    protected function writeXml()
    {
        $this
            ->writeNode('SKU')
            ->writeNode('StandardProductID')
            ->writeNode('ProductTaxCode')
            ->writeNode('LaunchDate')
            ->writeNode('DiscontinueDate')
            ->writeNode('ReleaseDate')
            ->writeNode('Condition')
            ->writeNode('Rebate')
            ->writeNode('ItemPackageQuantity')
            ->writeNode('NumberOfItems');

        $this->xml->startElement('DescriptionData');
        $this
            ->writeNode('Title')
            ->writeNode('Brand')
            ->writeNode('Description')
            ->writeNode('BulletPoint')
            ->writeNode('ItemDimensions')
            ->writeNode('PackageDimensions')
            ->writeNode('PackageWeight')
            ->writeNode('ShippingWeight')
            ->writeNode('MerchantCatalogNumber')
            ->writeNode('MSRP')
            ->writeNode('MaxOrderQuantity')
            ->writeNode('SerialNumberRequired')
            ->writeNode('Prop65')
            ->writeNode('CPSIAWarning')
            ->writeNode('CPSIAWarningDescription')
            ->writeNode('LegalDisclaimer')
            ->writeNode('Manufacturer')
            ->writeNode('MfrPartNumber')
            ->writeNode('SearchTerms')
            ->writeNode('PlatinumKeywords')
            ->writeNode('Memorabilia')
            ->writeNode('Autographed')
            ->writeNode('UsedFor')
            ->writeNode('ItemType')
            ->writeNode('OtherItemAttributes')
            ->writeNode('TargetAudience')
            ->writeNode('SubjectContent')
            ->writeNode('IsGiftWrapAvailable')
            ->writeNode('IsGiftMessageAvailable')
            ->writeNode('PromotionKeywords')
            ->writeNode('IsDiscontinuedByManufacturer')
            ->writeNode('DeliveryChannel')
            ->writeNode('MaxAggregateShipQuantity');
        $this->xml->endElement();

        $this->xml->startElement('DiscoveryData');
        $this
            ->writeNode('Priority')
            ->writeNode('BrowseExclusion')
            ->writeNode('RecommendationExclusion');
        $this->xml->endElement();
    }

}

