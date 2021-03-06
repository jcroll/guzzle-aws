<?php
/**
 * @package Guzzle PHP <http://www.guzzlephp.org>
 * @license See the LICENSE file that was distributed with this source code.
 */

namespace Guzzle\Aws\Tests\S3\Command\Object;

use Guzzle\Http\EntityBody;
use Guzzle\Aws\S3\Command\Object\GetObject;

/**
 * @author Michael Dowling <michael@guzzlephp.org>
 */
class GetObjectTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Guzzle\Aws\S3\Command\Object\GetObject
     * @covers Guzzle\Aws\S3\Command\Object\AbstractRequestObject
     */
    public function testGetObject()
    {
        $command = new GetObject();
        $command->setBucket('test')->setKey('key');
        
        $client = $this->getServiceBuilder()->get('test.s3');
        $this->setMockResponse($client, 's3/GetObjectResponse');
        $client->execute($command);

        $this->assertEquals('http://test.s3.amazonaws.com/key', $command->getRequest()->getUrl());
        $this->assertEquals('GET', $command->getRequest()->getMethod());
        $this->assertEquals('data', $command->getResponse()->getBody(true));
    }

    /**
     * @covers Guzzle\Aws\S3\Command\Object\GetObject
     */
    public function testGetObjectTorrent()
    {
        $command = new GetObject();
        $command->setBucket('test')->setKey('key')->setTorrent(true);
        $client = $this->getServiceBuilder()->get('test.s3');
        $this->setMockResponse($client, 's3/GetObjectResponse');
        $client->execute($command);
        $this->assertEquals('http://test.s3.amazonaws.com/key?torrent', $command->getRequest()->getUrl());
    }

    /**
     * @covers Guzzle\Aws\S3\Command\Object\GetObject
     */
    public function testAllowsCustomBody()
    {
        $command = new GetObject();
        $command->setBucket('test')->setKey('key');
        
        $body = EntityBody::factory(fopen('php://temp', 'r+'));
        $command->setResponseBody($body);

        $client = $this->getServiceBuilder()->get('test.s3', true);
        $this->getServer()->enqueue((string) $this->getMockResponse('s3/GetObjectResponse'));
        $client->setBaseUrl($this->getServer()->getUrl());
        $client->setForcePathHostingBuckets(true);
        $client->execute($command);

        $this->assertSame($command->getResponse()->getBody(), $body);
        $this->assertEquals('data', $command->getResponse()->getBody(true));
    }
}