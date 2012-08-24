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
 * @guzzle names type="array" doc="An array of exact name matches for the key"
 * @guzzle filters type="array" doc="An associative array containing key/value pairs for filters. I.E. array('key-name' => 'foobar')" 
 */
class DescribeKeyPairs extends AbstractCommand {
	
	protected function build() {		
		$this->request = $this->client->createRequest('GET');
		$this->request->getQuery()->set("Action", "DescribeKeyPairs");
		
		if($this->get('names')) {
			foreach($this->get('names') as $idx => $name) {
				$nonZeroIdx = $idx+1;
				$this->request->getQuery()->set("KeyName.$nonZeroIdx", $name);
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