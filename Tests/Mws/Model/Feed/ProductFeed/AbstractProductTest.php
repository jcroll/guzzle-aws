<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\ProductFeed;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\ProductFeed\ClothingProduct;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

class AbstractProductTest extends GuzzleTestCase
{
    public function testAbstractProduct()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $product = new ClothingProduct($xml);
        
        $product
            ->addBulletPoint('Foo')
            ->addCPSIAWarning('choking_hazard_balloon')
            ->addOtherItemAttributes('Test')
            ->addPlatinumKeywords('Sample')
            ->addPromotionKeywords('Test')
            ->addRebate('50')
            ->addSearchTerms('Foo')
            ->addSubjectContent('Test')
            ->addTargetAudience('asdf')
            ->addUsedFor('Bar')
            ->setAutographed(true)
            ->setBrand('adidas')
            ->setBrowseExclusion(false)
            ->setCPSIAWarningDescription('blah')
            ->setCondition(DataType\ConditionInfo::factory('New'))
            ->setDeliveryChannel('direct_ship')
            ->setDescription('How now brown cow')
            ->setDesigner('John Doe')
            ->setDiscontinueDate(new \DateTime('2011-01-01T00:00:00-06:00'))
            ->setIsDiscontinuedByManufacturer(false)
            ->setIsGiftMessageAvailable(false)
            ->setIsGiftWrapAvailable(false)
            ->setItemDimensions(DataType\Dimensions::factory(
                    DataType\LengthDimension::factory(1, 'IN'),
                    DataType\LengthDimension::factory(2, 'IN')
            ))
            ->setItemPackageQuantity(1)
            ->setItemType('Shoe')
            ->setLaunchDate(new \DateTime('2000-01-01T00:00:00-06:00'))
            ->setLegalDisclaimer('Foo')
            ->setManufacturer('Acme')
            ->setMaxAggregateShipQuantity(1)
            ->setMaxOrderQuantity(1)
            ->setMemorabilia(false)
            ->setMerchantCatalogNumber(1234)
            ->setMfrPartNumber('0001')
            ->setMsrp(DataType\CurrencyAmount::factory(100, 'USD'))
            ->setNumberOfItems(1)
            ->setPackageDimensions(DataType\SpatialDimensions::factory(
                    DataType\LengthDimension::factory(1, 'IN'),
                    DataType\LengthDimension::factory(2, 'IN'),
                    DataType\LengthDimension::factory(3, 'IN')
            ))
            ->setPackageWeight(DataType\WeightDimension::factory(1, 'LB'))
            ->setPriority(1)
            ->setProductTaxCode('A_GEN_TAX')
            ->setProp65(false)
            ->setRecommendationExclusion(false)
            ->setReleaseDate(new \DateTime('2002-01-01T00:00:00-06:00'))
            ->setSerialNumberRequired(false)
            ->setShippingWeight(DataType\WeightDimension::factory(1, 'LB'))
            ->setSku('ASDF')
            ->setStandardProductId(DataType\StandardProductId::factory('UPC', 1234))
            ->setTitle('Sample');
        
        $product->writeXml();
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        
        //$this->assertXmlStringEqualsXmlFile(__DIR__ . '/Mock/AbstractProduct.xml', $dom->saveXML());
    }
    
    /**
     * @depends testAbstractProduct
     */
    public function testAddCPSIAWarning()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $this->setExpectedException('InvalidArgumentException');
        $product = new ClothingProduct($xml);
        $product->addCPSIAWarning('Foo');
    }
    
    public function testSetDeliveryChannel()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $this->setExpectedException('InvalidArgumentException');
        $product = new ClothingProduct($xml);
        $product->setDeliveryChannel('Foo');
    }
    
    public function testSetPriority()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $this->setExpectedException('InvalidArgumentException');
        $product = new ClothingProduct($xml);
        $product->setPriority(100);
    }
}