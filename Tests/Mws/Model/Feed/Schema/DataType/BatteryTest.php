<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\Schema\DataType;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\Battery;

class BatteryTest extends GuzzleTestCase
{
    public function testBattery()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $battery = new Battery(true, true, 'battery_type_9v', 1);
        $battery
            ->setAreBatteriesIncluded(true)
            ->setAreBatteriesRequired(true)
            ->setBatteryType('battery_type_9v')
            ->setNumberOfBatteries(1);
        
        $battery->writeXml($xml, 'Battery');
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../../XSD/DataType.xsd'));
    }
    
    public function testSetBatteryType()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        
        $battery = new Battery();
        
        $this->setExpectedException('InvalidArgumentException');
        $battery->setBatteryType('foo');
    }
}