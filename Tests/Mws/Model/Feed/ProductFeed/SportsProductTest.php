<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\ProductFeed;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\ProductFeed\SportsProduct;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

class SportsProductTest extends GuzzleTestCase
{
    public function testSportsProduct()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $product = new SportsProduct($xml);
        
        $product
            ->setSku('ASDF')
            ->setTitle('Test')

            ->setAgeGenderCategory('5+')
            ->setAmperage(DataType\AmperageDimension::factory(1, 'amps'))
            ->setBikeRimSize(DataType\LengthDimension::factory(26, 'IN'))
            ->setBootSize('11')
            ->setBounce('asdf')
            ->setCalfSize('Small')
            ->setCaliber('.45')
            ->setCapacity(DataType\VolumeDimension::factory(1, 'cup'))
            ->setClub('foo')
            ->setColor('Blue')
            ->setCurvature('Bar')
            ->setDesign('asdf')
            ->setDiameter(DataType\LengthDimension::factory(1, 'IN'))
            ->setDivingHoodThickness(DataType\LengthDimension::factory(1, 'MM'))
            ->setFencingPommelType('blah')
            ->setFlavor('asdf')
            ->setGolfFlex('blah')
            ->setGolfLoft(DataType\DegreeDimension::factory(1, 'degrees'))
            ->setGripSize('Large')
            ->setGripType('Baz')
            ->setHand('right')
            ->setHeadSize('mid-plus')
            ->setHeight(DataType\LengthDimension::factory(1, 'IN'))
            ->setIrons('9')
            ->setIsAdultProduct(false)
            ->setIsCustomizable(false)
            ->setItemThickness(DataType\LengthDimension::factory(1, 'IN'))
            ->setLength(DataType\LengthDimension::factory(2, 'IN'))
            ->setLensColor('Black')
            ->setLieAngle('5')
            ->setLineCapacity('100')
            ->setLineWeight('50')
            ->setMaterial('Metal')
            ->setModel('Foo')
            ->setNumberOfItems(1)
            ->setPackaging('Box')
            ->setParentage('child')
            ->setProductType('GolfClubs')
            ->setQuantity(1)
            ->setRounds(3)
            ->setShaftLength(DataType\LengthDimension::factory(12, 'IN'))
            ->setShaftMaterial('Metal')
            ->setShaftType('attacker-shafts')
            ->setShape('Round')
            ->setSize('Small')
            ->setStyle('Blah')
            ->setTemperatureRating(DataType\TemperatureRatingDimension::factory(100, 'degrees-fahrenheit'))
            ->setTensionLevel('High')
            ->setVariationTheme('Size')
            ->setVolume(DataType\VolumeDimension::factory(1, 'cup'))
            ->setWattage(DataType\WattageDimension::factory(1, 'watts'))
            ->setWeight(DataType\WeightDimension::factory(1, 'LB'))
            ->setWeightSupported(DataType\WeightDimension::factory(100, 'LB'))
            ->setWheelSize(DataType\LengthDimension::factory(15, 'IN'))
            ->setWidth(DataType\LengthDimension::factory(24, 'IN'))
            ->setWood(5);
        
        $product->writeXml();
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../XSD/Product.xsd'));
    }
    
    /**
     * @depends testSportsProduct
     */
    public function testSetParentage()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        $product = new SportsProduct($xml);
        
        $this->setExpectedException('InvalidArgumentException');
        $product->setParentage('Foo');
    }
    
    /**
     * @depends testSportsProduct
     */
    public function testSetVariationTheme()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        $product = new SportsProduct($xml);
        
        $this->setExpectedException('InvalidArgumentException');
        $product->setVariationTheme('Foo');
    }
    
    /**
     * @depends testSportsProduct
     */
    public function testSetProductType()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        $product = new SportsProduct($xml);
        
        $this->setExpectedException('InvalidArgumentException');
        $product->setProductType('Foo');
    }
    
    /**
     * @depends testSportsProduct
     */
    public function testSetHand()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        $product = new SportsProduct($xml);
        
        $this->setExpectedException('InvalidArgumentException');
        $product->setHand('Foo');
    }
    
    /**
     * @depends testSportsProduct
     */
    public function testSetHeadSize()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        $product = new SportsProduct($xml);
        
        $this->setExpectedException('InvalidArgumentException');
        $product->setHeadSize('Foo');
    }
    
    /**
     * @depends testSportsProduct
     */
    public function testSetShaftType()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        $product = new SportsProduct($xml);
        
        $this->setExpectedException('InvalidArgumentException');
        $product->setShaftType('Foo');
    }
}

