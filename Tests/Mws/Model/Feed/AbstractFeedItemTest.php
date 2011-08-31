<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\PriceFeed\Price;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

class AbstractFeedItemTest extends GuzzleTestCase
{
    protected function getItem()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $item = new Price($xml);
        
        return $item;
    }
    
    public function testAbstractFeedItem()
    {
        $item = $this->getItem();
        
        $item->writeXml();
        $item->toString();
        $item->__toString();
    }
    
    public function testSet()
    {
        $item = $this->getItem();
        $item->set('Field2', 'Bar');
        $item->set('Field3', array(
            'Sample' => DataType\LengthDimension::factory(1, 'IN')
        ));
        
        $foo = $item->get('Field2');
        $this->assertEquals($foo, 'Bar');
        
        $this->setExpectedException('InvalidArgumentException');
        $item->set('Foo', null);
        
        $item->writeNode('Field2');
        $item->writeNode('Field3');
    }
    
    public function testAdd()
    {
        $item = $this->getItem();
        
        $item->add('Field1', 'Foo');
        
        $item->writeNode('Field1');
        
        $this->setExpectedException('RuntimeException');
        $item->add('Test', 1, 1);
        $item->add('Test', 1, 1);
    }
    
    /**
     * @depends testAbstractFeedItem
     * @depends testSet
     * @depends testAdd
     */
    public function testWriteNode()
    {
        $item = $this->getItem();
        
        $item->set('Field1', 'Foo');
        $item->add('Field2', 'Bar');
        $item->add('Field2', 'Baz');
        $item->add('Field3', DataType\LengthDimension::factory('1', 'IN'));
        
        $item
            ->writeNode('Field1')
            ->writeNode('Field2')
            ->writeNode('Field3');
    }
    
}