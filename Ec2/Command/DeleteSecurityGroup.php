<?php
/**
 * @package Guzzle PHP <http://www.guzzlephp.org>
 * @license See the LICENSE file that was distributed with this source code.
 */

namespace Guzzle\Aws\Ec2\Command;

use Guzzle\Service\Command\AbstractCommand;

/**
 * Deletes one Security Group
 *
 * @author Ryan J. Geyer <me@ryangeyer.com>
 *
 * @guzzle group_id type="string" doc="The AWS id of the Security Group"
 * @guzzle group_name type="string" doc="The AWS name of the Security Group" 
 */
class DeleteSecurityGroup extends AbstractCommand {
	
	protected function build() {		
		$this->request = $this->client->createRequest('GET');
		$this->request->getQuery()->set("Action", "DeleteSecurityGroup");
		
		if($this->get('group_id')) {
			$this->request->getQuery()->set("GroupId", $this->get('group_id'));
		} else if ($this->get('group_name')) {
			$this->request->getQuery()->set("GroupName", $this->get('group_name'));			
		}
	}

}