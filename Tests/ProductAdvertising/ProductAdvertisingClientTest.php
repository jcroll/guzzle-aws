<?php

namespace Guzzle\Aws\Tests\ProductAdvertising;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\ProductAdvertising\ProductAdvertisingClient;

class ProductAdvertisingClientTest extends GuzzleTestCase
{
    public function testProductAdvertisingClient()
    {
        $client = ProductAdvertisingClient::factory(array(
            'access_key'    => 'foo',
            'secret_key'    => 'foo',
            'associate_tag' => 'foo'
        ));
        
        $this->assertInstanceOf('Guzzle\Aws\ProductAdvertising\ProductAdvertisingClient', $client);
    }
}