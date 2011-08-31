<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\ImageFeed;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\ProductFeed\JewelryWatchProduct;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

class JewelryWatchProductTest extends GuzzleTestCase
{
    public function testJewelryWatchProduct()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $product = new JewelryWatchProduct($xml);
        $product
            ->setSku('ASDF')
            ->setTitle('Test')
                
            ->setBandColor('Blue')
            ->setBandLength('7')
            ->setBandMaterial('Rubber')
            ->setBandWidth(DataType\LengthDimension::factory('1', 'IN'))
            ->setBattery(DataType\Battery::factory(true, true, 'battery_type_2/3A', 2))
            ->setBatteryTypeLithiumIon(1)
            ->setBatteryTypeLithiumMetal(1)
            ->setBezelMaterial('Metal')
            ->setCalendarType('Wheel')
            ->setCaseMaterial('Metal')
            ->setCaseSizeDiameter(DataType\LengthDimension::factory('1', 'IN'))
            ->setCaseSizeThickness(DataType\LengthDimension::factory('0.25', 'IN'))
            ->setClaspType('Foo')
            ->setCountryOfOrigin('CN')
            ->setCrystal('Glass')
            ->setDialColor('White')
            ->setDialColorMap('Blah')
            ->setDisplayType('Foo')
            ->setEstatePeriod('60')
            ->setGemType('Diamond')
            ->setItemShape('Round')
            ->setLithiumBatteryEnergyContent('350')
            ->setLithiumBatteryPackaging('batteries_contained_in_equipment')
            ->setLithiumBatteryVoltage('3.6')
            ->setLithiumBatteryWeight('1oz')
            ->setMaximumWaterPressure(DataType\PressureDimension::factory('2', 'bars'))
            ->setMetalStamp('test')
            ->setModelYear('2011')
            ->setMovementType('Quartz')
            ->setNumberOfLithiumIonCells('1')
            ->setNumberOfLithiumMetalCells('1')
            ->setParentage('child')
            ->setResaleType('test')
            ->setSeason('Summer')
            ->setSellerWarrantyDescription('1 Year')
            ->setSpecialFeatures('Waterproof')
            ->setVariationTheme('BandColor')
            ->setWarrantyType('1 Year')
            ->setWaterResistantDepth(DataType\LengthDimension::factory(150, 'M'));
        
        $product->writeXml();
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../XSD/Product.xsd'));
    }
    
    /**
     * @depends testJewelryWatchProduct
     */
    public function testSetParentage()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        $product = new JewelryWatchProduct($xml);
        
        $this->setExpectedException('InvalidArgumentException');
        $product->setParentage('Foo');
    }
    
    /**
     * @depends testJewelryWatchProduct
     */
    public function testSetVariationTheme()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        $product = new JewelryWatchProduct($xml);
        
        $this->setExpectedException('InvalidArgumentException');
        $product->setVariationTheme('Foo');
    }
    
    /**
     * @depends testJewelryWatchProduct
     */
    public function testSetCountryOfOrigin()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        $product = new JewelryWatchProduct($xml);
        
        $this->setExpectedException('InvalidArgumentException');
        $product->setCountryOfOrigin('Foo');
    }
    
    /**
     * @depends testJewelryWatchProduct
     */
    public function testSetModelYear()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        $product = new JewelryWatchProduct($xml);
        
        $this->setExpectedException('InvalidArgumentException');
        $product->setModelYear(123);
    }
    
    /**
     * @depends testJewelryWatchProduct
     */
    public function testSetLithiumBatteryPackaging()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        $product = new JewelryWatchProduct($xml);
        
        $this->setExpectedException('InvalidArgumentException');
        $product->setLithiumBatteryPackaging('Foo');
    }
}