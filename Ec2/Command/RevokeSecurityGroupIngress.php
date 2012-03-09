<?php
/**
 * @package Guzzle PHP <http://www.guzzlephp.org>
 * @license See the LICENSE file that was distributed with this source code.
 */

namespace Guzzle\Aws\Ec2\Command;

use Guzzle\Service\Command\AbstractCommand;

/**
 * Revokes one or many security group ingress rules
 *
 * @author Ryan J. Geyer <me@ryangeyer.com>
 *
 * @guzzle rules required="true" type="array" doc="An associative array. For a CIDR based rule the required keys are (protocol, from_port, to_port, cidr_ips).  For a Group based rule required keys are either (user_id, group_id) or (group_id, protocol, from_port, to_port)"
 * @guzzle group_id type="string" doc="The AWS id of the Security Group"
 * @guzzle group_name type="string" doc="The AWS name of the Security Group" 
 */
class RevokeSecurityGroupIngress extends AbstractCommand {
	
	protected function build() {		
		$this->request = $this->client->createRequest('GET');
		$this->request->getQuery()->set("Action", "RevokeSecurityGroupIngress");
		
		if($this->get('group_id')) {
			$this->request->getQuery()->set("GroupId", $this->get('group_id'));
		} else if ($this->get('group_name')) {
			$this->request->getQuery()->set("GroupName", $this->get('group_name'));			
		}
		
		foreach($this->get('rules') as $idx => $rule) {
			$ruleIdx = $idx + 1;
			
			foreach($rule as $rule_key => $rule_val) {
				switch($rule_key) {
					case 'protocol':
						$this->request->getQuery()->set("IpPermissions.$ruleIdx.IpProtocol", $rule[$rule_key]);
						break;
					case 'from_port':
						$this->request->getQuery()->set("IpPermissions.$ruleIdx.FromPort", $rule[$rule_key]);
						break;
					case 'to_port':
						$this->request->getQuery()->set("IpPermissions.$ruleIdx.ToPort", $rule[$rule_key]);
						break;
					case 'user_id':
						$this->request->getQuery()->set("IpPermissions.$ruleIdx.Groups.1.UserId", $rule[$rule_key]);
						break;
					case 'group_name':
						$this->request->getQuery()->set("IpPermissions.$ruleIdx.Groups.1.GroupName", $rule[$rule_key]);
						break;
					case 'group_id':
						$this->request->getQuery()->set("IpPermissions.$ruleIdx.Groups.1.GroupId", $rule[$rule_key]);
						break;
					case 'cidr_ips':
						$this->request->getQuery()->set("IpPermissions.$ruleIdx.IpRanges.1.CidrIp", $rule[$rule_key]);
						break;
				}		
				
			}
		}
	}

}