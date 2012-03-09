<?php
/**
 * @package Guzzle PHP <http://www.guzzlephp.org>
 * @license See the LICENSE file that was distributed with this source code.
 */

namespace Guzzle\Aws\Tests\Aws\Command;

use Guzzle\Aws\Ec2\Command\DeleteKeyPair;

use Guzzle\Aws\Ec2\Ec2Client;

/**
 * @author Ryan J. Geyer <me@ryangeyer.com>
 */
class DeleteKeyPairTest extends \Guzzle\Tests\GuzzleTestCase {

	/**
	 * @covers Guzzle\Aws\Ec2\Command\DeleteKeyPair
	 */
	public function testCanDeleteKeyPair() {
		$command = new DeleteKeyPair();		
		$command->set('key_name', 'test');
		
		$client = $this->getServiceBuilder()->get('test.ec2');
		$this->setMockResponse($client, 'ec2/DeleteKeyPairResponse');
		
		$client->execute($command);
		
		$request = (string)$command->getRequest();
		$response = (string)$command->getResponse();
		
		$this->assertEquals('GET', $command->getRequest()->getMethod());
		$this->assertContains('GET /?Action=DeleteKeyPair', $request);
	}
	
}
