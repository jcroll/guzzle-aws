<?php
/**
 * @package Guzzle PHP <http://www.guzzlephp.org>
 * @license See the LICENSE file that was distributed with this source code.
 */

namespace Guzzle\Aws\Ec2\Command;

use Guzzle\Service\Command\AbstractCommand;

/**
 * Deletes one Ssh Key Pair
 *
 * @author Ryan J. Geyer <me@ryangeyer.com>
 *
 * @guzzle key_name required="true" type="string" doc="The AWS name of the key pair" 
 */
class DeleteKeyPair extends AbstractCommand {
	
	protected function build() {		
		$this->request = $this->client->createRequest('GET');
		$this->request->getQuery()->set("Action", "DeleteKeyPair");
		
		$this->request->getQuery()->set("KeyName", $this->get('key_name'));
	}

}