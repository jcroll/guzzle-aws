<?php
/**
 * @package Guzzle PHP <http://www.guzzlephp.org>
 * @license See the LICENSE file that was distributed with this source code.
 */

namespace Guzzle\Aws\Tests\Aws\Command;

use Guzzle\Aws\Ec2\Ec2Client;

use Guzzle\Aws\Ec2\Command\DescribeKeyPairs;

/**
 * @author Ryan J. Geyer <me@ryangeyer.com>
 */
class DescribeKeyPairsTest extends \Guzzle\Tests\GuzzleTestCase {
	
	/**
	 * @covers Guzzle\Aws\Ec2\Command\DescribeKeyPairs
	 */
	public function testCanListKeyAllPairs() {
		$command = new DescribeKeyPairs();
		
		$client = $this->getServiceBuilder()->get('test.ec2');
		$this->setMockResponse($client, 'ec2/DescribeKeyPairsResponse');
		
		$client->execute($command);
		
		$request = (string)$command->getRequest();
		$response = (string)$command->getResponse();
		
		$this->assertEquals('GET', $command->getRequest()->getMethod());
		$this->assertContains('GET /?Action=DescribeKeyPairs', $request);
	}
	
	/**
	 * @covers Guzzle\Aws\Ec2\Command\DescribeKeyPairs
	 */
	public function testCanListKeyPairSpecifyingOneName() {
		$command = new DescribeKeyPairs();
		$command->set('names', array('Key1'));
		
		$client = $this->getServiceBuilder()->get('test.ec2');
		$this->setMockResponse($client, 'ec2/DescribeKeyPairsResponse');
		
		$client->execute($command);
		
		$request = (string)$command->getRequest();
		$response = (string)$command->getResponse();
		
		$this->assertEquals('GET', $command->getRequest()->getMethod());
		$this->assertContains('GET /?Action=DescribeKeyPairs', $request);
		
		# Test for the first name 
		$this->assertContains('KeyName.1=Key1', $request);		
	}
	
	/**
	 * @covers Guzzle\Aws\Ec2\Command\DescribeKeyPairs
	 */
	public function testCanListKeyPairSpecifyingManyNames() {
		$command = new DescribeKeyPairs();
		$command->set('names', array('Key1', 'Key2', 'Key3'));
		
		$client = $this->getServiceBuilder()->get('test.ec2');
		$this->setMockResponse($client, 'ec2/DescribeKeyPairsResponse');
		
		$client->execute($command);
		
		$request = (string)$command->getRequest();
		$response = (string)$command->getResponse();
		
		$this->assertEquals('GET', $command->getRequest()->getMethod());
		$this->assertContains('GET /?Action=DescribeKeyPairs', $request);
		
		# Test for names 
		$this->assertContains('KeyName.1=Key1', $request);
		$this->assertContains('KeyName.2=Key2', $request);
		$this->assertContains('KeyName.3=Key3', $request);		
	}
	
	/**
	 * @covers Guzzle\Aws\Ec2\Command\DescribeKeyPairs
	 */
	public function testCanListKeyPairSpecifyingOneFilter() {
		$command = new DescribeKeyPairs();
		$command->set('filters', array('key-name' => 'Key1'));
		
		$client = $this->getServiceBuilder()->get('test.ec2');
		$this->setMockResponse($client, 'ec2/DescribeKeyPairsResponse');
		
		$client->execute($command);
		
		$request = (string)$command->getRequest();
		$response = (string)$command->getResponse();
		
		$this->assertEquals('GET', $command->getRequest()->getMethod());
		$this->assertContains('GET /?Action=DescribeKeyPairs', $request);
		
		# Test for the first filter 
		$this->assertContains('Filter.1.Name=key-name', $request);
		$this->assertContains('Filter.1.Value.1=Key1', $request);				
	}
	
	/**
	 * @covers Guzzle\Aws\Ec2\Command\DescribeKeyPairs
	 */
	public function testCanListKeyPairSpecifyingManyFilters() {
		$command = new DescribeKeyPairs();
		$command->set('filters', array('key-name' => 'Key1', 'fingerprint' => 'b0*'));
		
		$client = $this->getServiceBuilder()->get('test.ec2');
		$this->setMockResponse($client, 'ec2/DescribeKeyPairsResponse');
		
		$client->execute($command);
		
		$request = (string)$command->getRequest();
		$response = (string)$command->getResponse();
		
		$this->assertEquals('GET', $command->getRequest()->getMethod());
		$this->assertContains('GET /?Action=DescribeKeyPairs', $request);
		
		# Test for the first filter 
		$this->assertContains('Filter.1.Name=key-name', $request);
		$this->assertContains('Filter.1.Value.1=Key1', $request);
		$this->assertContains('Filter.2.Name=fingerprint', $request);
		$this->assertContains('Filter.2.Value.1=b0%2A', $request);				
	}
	
}