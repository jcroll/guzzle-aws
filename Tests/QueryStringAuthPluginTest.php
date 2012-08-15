<?php
/**
 * @package Guzzle PHP <http://www.guzzlephp.org>
 * @license See the LICENSE file that was distributed with this source code.
 */

namespace Guzzle\Aws\Tests;

use Guzzle\Common\Event;
use Guzzle\Http\Message\RequestFactory;
use Guzzle\Service\Command\CommandSet;
use Guzzle\Aws\Signature\SignatureV2;
use Guzzle\Aws\QueryStringAuthPlugin;

/**
 * @author Michael Dowling <michael@guzzlephp.org>
 */
class QueryStringAuthPluginTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Guzzle\Aws\QueryStringAuthPlugin
     */
    public function testAddsQueryStringAuth()
    {
        $signature = new SignatureV2('a', 'b');
        
        $plugin = new QueryStringAuthPlugin($signature, '2009-04-15');
        $this->assertSame($signature, $plugin->getSignature());
        $this->assertEquals('2009-04-15', $plugin->getApiVersion());

        $request = RequestFactory::getInstance()->create('get', 'http://www.test.com/');
        $request->getEventDispatcher()->addSubscriber($plugin);
        
        $request->getEventDispatcher()->dispatch('request.before_send', new Event(array('request' => $request)));
        
        $qs = $request->getQuery();
        $this->assertTrue($qs->hasKey('Timestamp') !== false);
        $this->assertEquals('2009-04-15', $qs->get('Version'));
        $this->assertEquals('2', $qs->get('SignatureVersion'));
        $this->assertEquals('HmacSHA256', $qs->get('SignatureMethod'));
        $this->assertEquals('a', $qs->get('AWSAccessKeyId'));
    }

    /**
     * @covers Guzzle\Aws\QueryStringAuthPlugin
     */
    public function testAddsAuthWhenUsingCommandSets()
    {
        $client = $this->getServiceBuilder()->get('test.simple_db');
        $listeners = $client->getEventDispatcher()->getListeners('request.before_send');
        $this->assertInstanceOf('Guzzle\\Aws\\QueryStringAuthPlugin', $listeners[0][0]);

        $this->setMockResponse($client, array(
            'sdb/DeleteDomainResponse',
            'sdb/CreateDomainResponse'
        ));

        $set = array(
            $client->getCommand('delete_domain', array('domain' => '123')),
            $client->getCommand('create_domain', array('domain' => '123')),
        );

        $client->execute($set);

        foreach ($set as $command) {
            $qs = $command->getRequest()->getQuery();
            $this->assertTrue($qs->hasKey('Timestamp') !== false);
            $this->assertEquals('2009-04-15', $qs->get('Version'));
            $this->assertEquals('2', $qs->get('SignatureVersion'));
            $this->assertEquals('HmacSHA256', $qs->get('SignatureMethod'));
            $this->assertEquals('12345', $qs->get('AWSAccessKeyId'));
        }
    }
}