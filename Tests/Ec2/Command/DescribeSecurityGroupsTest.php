<?php
/**
 * @package Guzzle PHP <http://www.guzzlephp.org>
 * @license See the LICENSE file that was distributed with this source code.
 */

namespace Guzzle\Aws\Tests\Aws\Command;

use Guzzle\Aws\Ec2\Ec2Client;

use Guzzle\Aws\Ec2\Command\DescribeSecurityGroups;

/**
 * @author Ryan J. Geyer <me@ryangeyer.com>
 */
class DescribeSecurityGroupsTest extends \Guzzle\Tests\GuzzleTestCase {
	
	/**
	 * @covers Guzzle\Aws\Ec2\Command\DescribeSecurityGroups
	 */
	public function testCanListAllSecurityGroups() {
		$command = new DescribeSecurityGroups();
		
		$client = $this->getServiceBuilder()->get('test.ec2');
		$this->setMockResponse($client, 'ec2/DescribeSecurityGroupsResponse');
		
		$client->execute($command);
		
		$request = (string)$command->getRequest();
		$response = (string)$command->getResponse();
		
		$this->assertEquals('GET', $command->getRequest()->getMethod());
		$this->assertContains('GET /?Action=DescribeSecurityGroups', $request);
	}
	
	/**
	 * @covers Guzzle\Aws\Ec2\Command\DescribeSecurityGroups
	 */
	public function testCanListSecurityGroupSpecifyingOneName() {
		$command = new DescribeSecurityGroups();
		$command->set('group_names', array('Group1'));
		
		$client = $this->getServiceBuilder()->get('test.ec2');
		$this->setMockResponse($client, 'ec2/DescribeSecurityGroupsResponse');
		
		$client->execute($command);
		
		$request = (string)$command->getRequest();
		$response = (string)$command->getResponse();
		
		$this->assertEquals('GET', $command->getRequest()->getMethod());
		$this->assertContains('GET /?Action=DescribeSecurityGroups', $request);
		
		# Test for the first name 
		$this->assertContains('GroupName.1=Group1', $request);		
	}
	
	/**
	 * @covers Guzzle\Aws\Ec2\Command\DescribeSecurityGroups
	 */
	public function testCanListSecurityGroupsSpecifyingManyNames() {
		$command = new DescribeSecurityGroups();
		$command->set('group_names', array('Group1', 'Group2', 'Group3'));
		
		$client = $this->getServiceBuilder()->get('test.ec2');
		$this->setMockResponse($client, 'ec2/DescribeSecurityGroupsResponse');
		
		$client->execute($command);
		
		$request = (string)$command->getRequest();
		$response = (string)$command->getResponse();
		
		$this->assertEquals('GET', $command->getRequest()->getMethod());
		$this->assertContains('GET /?Action=DescribeSecurityGroups', $request);
		
		# Test for names 
		$this->assertContains('GroupName.1=Group1', $request);
		$this->assertContains('GroupName.2=Group2', $request);
		$this->assertContains('GroupName.3=Group3', $request);		
	}
	
	/**
	 * @covers Guzzle\Aws\Ec2\Command\DescribeSecurityGroups
	 */
	public function testCanListSecurityGroupsSpecifyingOneFilter() {
		$command = new DescribeSecurityGroups();
		$command->set('filters', array('group-name' => 'Group1'));
		
		$client = $this->getServiceBuilder()->get('test.ec2');
		$this->setMockResponse($client, 'ec2/DescribeSecurityGroupsResponse');
		
		$client->execute($command);
		
		$request = (string)$command->getRequest();
		$response = (string)$command->getResponse();
		
		$this->assertEquals('GET', $command->getRequest()->getMethod());
		$this->assertContains('GET /?Action=DescribeSecurityGroups', $request);
		
		# Test for the first filter 
		$this->assertContains('Filter.1.Name=group-name', $request);
		$this->assertContains('Filter.1.Value.1=Group1', $request);				
	}
	
	/**
	 * @covers Guzzle\Aws\Ec2\Command\DescribeSecurityGroups
	 */
	public function testCanListSecurityGroupsSpecifyingManyFilters() {
		$command = new DescribeSecurityGroups();
		$command->set('filters', array('group-name' => 'Group1', 'group_id' => 'sg-*'));
		
		$client = $this->getServiceBuilder()->get('test.ec2');
		$this->setMockResponse($client, 'ec2/DescribeSecurityGroupsResponse');
		
		$client->execute($command);
		
		$request = (string)$command->getRequest();
		$response = (string)$command->getResponse();
		
		$this->assertEquals('GET', $command->getRequest()->getMethod());
		$this->assertContains('GET /?Action=DescribeSecurityGroups', $request);
		
		# Test for the first filter 
		$this->assertContains('Filter.1.Name=group-name', $request);
		$this->assertContains('Filter.1.Value.1=Group1', $request);
		$this->assertContains('Filter.2.Name=group_id', $request);
		$this->assertContains('Filter.2.Value.1=sg-%2A', $request);				
 	}
	
}