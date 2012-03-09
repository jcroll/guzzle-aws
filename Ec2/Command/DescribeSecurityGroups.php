<?php
/**
 * @package Guzzle PHP <http://www.guzzlephp.org>
 * @license See the LICENSE file that was distributed with this source code.
 */

namespace Guzzle\Aws\Ec2\Command;

use Guzzle\Service\Command\AbstractCommand;

/**
 * Lists Ssh Key Pairs
 *
 * @author Ryan J. Geyer <me@ryangeyer.com>
 *
 * @guzzle group_names type="array" doc="An array of the text names of security groups to return"
 * @guzzle group_ids type="array" doc="An array of the AWS group id of security groups to return"
 * @guzzle filters type="array" doc="An associative array containing key/value pairs for filters. I.E. array('key-name' => 'foobar')"
 * @see http://docs.amazonwebservices.com/AWSEC2/latest/APIReference/ApiReference-query-DescribeSecurityGroups.html 
 */
class DescribeSecurityGroups extends AbstractCommand {
	
	protected function build() {		
		$this->request = $this->client->createRequest('GET');
		$this->request->getQuery()->set("Action", "DescribeSecurityGroups");
		
		if($this->get('group_names')) {
			foreach($this->get('group_names') as $idx => $name) {
				$nonZeroIdx = $idx+1;
				$this->request->getQuery()->set("GroupName.$nonZeroIdx", $name);
			}
		}
		
		if($this->get('group_ids')) {
			foreach($this->get('group_ids') as $idx => $id) {
				$nonZeroIdx = $idx+1;
				$this->request->getQuery()->set("GroupId.$nonZeroIdx", $id);
			}
		}
		
		if($this->get('filters')) {
			$idx = 1;
			foreach($this->get('filters') as $key => $value) {
				$this->request->getQuery()->set("Filter.$idx.Name", $key);
				$this->request->getQuery()->set("Filter.$idx.Value.1", $value);
				$idx++;
			}
		}
	}

}