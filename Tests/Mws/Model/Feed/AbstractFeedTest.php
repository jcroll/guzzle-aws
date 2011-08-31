<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed;

use Guzzle\Tests\GuzzleTestCase;

use Guzzle\Aws\Mws\Model\Feed\PriceFeed\Price;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

class AbstractFeedTest extends GuzzleTestCase
{
    public function testAbstractFeed()
    {
        $client = $this->getServiceBuilder()->get('test.mws');
        $feed = $client->getFeed('price');
        
        $this->assertInstanceOf('Guzzle\Aws\Mws\Model\Feed\PriceFeed', $feed);
    }
}
  