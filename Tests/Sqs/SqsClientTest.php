<?php
/**
 * @package Guzzle PHP <http://www.guzzlephp.org>
 * @license See the LICENSE file that was distributed with this source code.
 */

namespace Guzzle\Aws\Tests\Sqs;

use Guzzle\Aws\Sqs\SqsClient;

/**
 * @author Michael Dowling <michael@guzzlephp.org>
 */
class SqsClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Guzzle\Aws\Sqs\SqsClient
     */
    public function testBuildsClient()
    {
        $client = SqsClient::factory(array(
            'access_key' => 'a',
            'secret_key' => 'b'
        ));
        $this->assertInstanceOf('Guzzle\\Aws\\Sqs\\SqsClient', $client);


        $listeners = $client->getEventDispatcher()->getListeners('request.before_send');
        $this->assertInstanceOf('Guzzle\\Aws\\QueryStringAuthPlugin', $listeners[0][0]);
    }
}