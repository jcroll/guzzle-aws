<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\ProductFeed;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\ProductFeed\ClothingProduct;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

class ClothingProductTest extends GuzzleTestCase
{
    public function testClothingProduct()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $product = new ClothingProduct($xml);
        $product
            ->setSKU('Foo')
            ->setTitle('Sample')
                
            ->addDepartment('foo')
            ->addEventKeywords('Running')
            ->addExternalTestingCertification('foo')
            ->addMaterialAndFabric('Cotton')
            ->addOccasionAndLifestyle('Athletic')
            ->addPerformanceRating('Sunproof')
            ->addSpecialSizeType('bar')
            ->addSpecificUses('baz')
            ->addStyleKeywords('rad')
            ->setApparelClosureType('Button')
            ->setBeltLength(DataType\LengthDimension::factory('1', 'IN'))
            ->setBeltWidth(DataType\LengthDimension::factory('2', 'IN'))
            ->setBraBandSize(DataType\LengthDimension::factory('3', 'IN'))
            ->setCareInstructions('Machine wash cold')
            ->setChestSize(DataType\ClothingSizeDimension::factory('4', 'IN'))
            ->setClothingType('Shirt')
            ->setCollarType('asdf')
            ->setColor('Blue')
            ->setColorMap('Cow')
            ->setCountryOfOrigin('CN')
            ->setCupSize('DD')
            ->setFurisodeLength(DataType\LengthDimension::factory('5', 'IN'))
            ->setFurisodeWidth(DataType\LengthDimension::factory('6', 'IN'))
            ->setHeelHeight(DataType\LengthDimension::factory('7', 'IN'))
            ->setInnerMaterial('Silk')
            ->setInseamLength(DataType\ClothingSizeDimension::factory('8', 'IN'))
            ->setIsAdultProduct(false)
            ->setIsCustomizable(true)
            ->setMaterialComposition('test')
            ->setMaterialOpacity('50')
            ->setMaximumHeightRecommended(DataType\LengthDimension::factory('9', 'IN'))
            ->setMinimumHeightRecommended(DataType\LengthDimension::factory('10', 'IN'))
            ->setModelName('foobar')
            ->setModelNumber('001')
            ->setModelYear('2011')
            ->setNeckSize(DataType\ClothingSizeDimension::factory('11', 'IN'))
            ->setObiLength(DataType\LengthDimension::factory('12', 'IN'))
            ->setObiWidth(DataType\LengthDimension::factory('13', 'IN'))
            ->setOuterMaterial('Wool')
            ->setParentage('child')
            ->setPillowSize('Large')
            ->setProductSpecification('Testing')
            ->setSeason('Summer')
            ->setShaftDiameter('0.75 IN')
            ->setShoeClosureType('Lace')
            ->setShoeWidth('D')
            ->setSize('11')
            ->setSizeMap('11, 12, 13')
            ->setSleeveLength(DataType\ClothingSizeDimension::factory('14', 'IN'))
            ->setSleeveType('Banana')
            ->setSoleMaterial('Rubber')
            ->setStyleName('Derilicte')
            ->setTsukeobiWidth(DataType\LengthDimension::factory('15', 'IN'))
            ->setTsukeobiHeight(DataType\LengthDimension::factory('16', 'IN'))
            ->setVariationTheme('Size')
            ->setWaistSize(DataType\ClothingSizeDimension::factory('17', 'IN'))
            ->setWaistStyle('Baz')
            ->setWarnings('Foo');
        
        $product->writeXml();
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../XSD/Product.xsd'));
    }
    
    /**
     * @depends testClothingProduct
     */
    public function testSetParentage()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        $product = new ClothingProduct($xml);
        
        $this->setExpectedException('InvalidArgumentException');
        $product->setParentage('Foo');
    }
    
    /**
     * @depends testClothingProduct
     */
    public function testSetVariationTheme()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        $product = new ClothingProduct($xml);
        
        $this->setExpectedException('InvalidArgumentException');
        $product->setVariationTheme('Foo');
    }
    
    public function testSetClothingType()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        $product = new ClothingProduct($xml);
        
        $this->setExpectedException('InvalidArgumentException');
        $product->setClothingType('Foo');
    }
    
    public function testAddPerformanceRating()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        $product = new ClothingProduct($xml);
        
        $this->setExpectedException('InvalidArgumentException');
        $product->addPerformanceRating('Foo');
    }
    
    public function testSetCountryOfOrigin()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        $product = new ClothingProduct($xml);
        
        $this->setExpectedException('InvalidArgumentException');
        $product->setCountryOfOrigin('Foo');
    }
    
    public function testSetCupSize()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        $product = new ClothingProduct($xml);
        
        $this->setExpectedException('InvalidArgumentException');
        $product->setCupSize('Foo');
    }
    
    public function testSetShoeWidth()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        $product = new ClothingProduct($xml);
        
        $this->setExpectedException('InvalidArgumentException');
        $product->setShoeWidth('Foo');
    }
}