<?php
/**
 * @package Guzzle PHP <http://www.guzzlephp.org>
 * @license See the LICENSE file that was distributed with this source code.
 */

namespace Guzzle\Aws\Tests\Aws\Command;

use Guzzle\Aws\Ec2\Ec2Client;

use Guzzle\Aws\Ec2\Command\RevokeSecurityGroupIngress;

/**
 * @author Ryan J. Geyer <me@ryangeyer.com>
 */
class RevokeSecurityGroupIngressTest extends \Guzzle\Tests\GuzzleTestCase {
	
	/**
	 * @covers Guzzle\Aws\Ec2\Command\RevokeSecurityGroupIngress
	 */
	public function testCanDeleteIngressRules() {
		$command = new RevokeSecurityGroupIngress();
		$command->set('group_id', 'sg-08080808');
		$command->set('rules', array(
			array('group_id' => 'sg-08080808', 'protocol' => 'tcp', 'from_port' => 22, 'to_port' => 22),
			array('cidr_ips' => '0.0.0.0/0', 'protocol' => 'tcp', 'from_port' => 0, 'to_port' => 65535)
		));

		$client = $this->getServiceBuilder()->get('test.ec2');
		$this->setMockResponse($client, 'ec2/RevokeSecurityGroupIngressResponse');
		
		$client->execute($command);
		
		$request = (string)$command->getRequest();
		$response = (string)$command->getResponse();
		
		$this->assertEquals('GET', $command->getRequest()->getMethod());
		$this->assertContains('GET /?Action=RevokeSecurityGroupIngress', $request);		
		$this->assertContains('GroupId=sg-08080808', $request);
		
		# Test for the first rule 
		$this->assertContains('IpPermissions.1.Groups.1.GroupId=sg-08080808', $request);
		$this->assertContains('IpPermissions.1.IpProtocol=tcp', $request);
		$this->assertContains('IpPermissions.1.FromPort=22', $request);
		$this->assertContains('IpPermissions.1.ToPort=22', $request);

		# Test for second rule		
		$this->assertContains('IpPermissions.2.IpRanges.1.CidrIp=0.0.0.0%2F0', $request);
		$this->assertContains('IpPermissions.2.IpProtocol=tcp', $request);
		$this->assertContains('IpPermissions.2.FromPort=0', $request);
		$this->assertContains('IpPermissions.2.ToPort=65535', $request);
	}
	
}