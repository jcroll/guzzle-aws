<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\ImageFeed;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\ImageFeed\Image;

class ImageTest extends GuzzleTestCase
{
    public function testImage()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $image = new Image($xml);
        
        $image
            ->setImageLocation('http://www.example.org')
            ->setImageType('Main')
            ->setSku('ASDF');
        
        $image->writeXml();
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml->outputMemory(true));
        $this->assertTrue($dom->schemaValidate(__DIR__ . '/../../../XSD/Image.xsd'));
    }
    
    public function testSetImageType()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $image = new Image($xml);
        
        $this->setExpectedException('InvalidArgumentException');
        $image->setImageType('Foo');
    }
}