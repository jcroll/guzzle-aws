<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed\Schema\DataType;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType\LengthDimension;

class AbstractDimensionTest extends GuzzleTestCase
{
    public function testAbstractDimension()
    {
        $dim = new LengthDimension(1, 'IN');
        $dim
            ->setValue(1)
            ->setUnitOfMeasure('IN');
    }
    
    /**
     * @depends testAbstractDimension
     */
    public function testSetUnitOfMeasure()
    {
        $dim = new LengthDimension();
        
        $this->setExpectedException('InvalidArgumentException');
        $dim->setUnitOfMeasure('Foo');
    }
}