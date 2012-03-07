<?php
/**
 * @package Guzzle PHP <http://www.guzzlephp.org>
 * @license See the LICENSE file that was distributed with this source code.
 */

namespace Guzzle\Aws\Ec2;

use Guzzle\Common\Inspector;
use Guzzle\Http\Plugin\ExponentialBackoffPlugin;
use Guzzle\Aws\AbstractClient;
use Guzzle\Aws\QueryStringAuthPlugin;
use Guzzle\Aws\Signature\SignatureV2;

/**
 * Client for interacting with Amazon Ec2
 * 
 * @author Ryan J. Geyer <me@ryangeyer.com>
 */
class Ec2Client extends AbstractClient {
	const REGION_US_EAST_1 			= 'ec2.us-east-1.amazonaws.com'; // Endpoint located in the US East (Northern Virginia) Region
	const REGION_US_WEST_2 			= 'ec2.us-west-2.amazonaws.com'; // Endpoint located in the US West (Oregon) Region
	const REGION_US_WEST_1 			= 'ec2.us-west-1.amazonaws.com'; // Endpoint located in the US West (Northern California) Region
	const REGION_EU_WEST_1 			= 'ec2.eu-west-1.amazonaws.com'; // Endpoint located in the EU (Ireland) Region
	const REGION_AP_SOUTHEAST_1 = 'ec2.ap-southeast-1.amazonaws.com'; // Endpoint located in the Asia Pacific (Singapore) Region
	const REGION_AP_NORTHEAST_1 = 'ec2.ap-northeast-1.amazonaws.com'; // Endpoint located in the Asia Pacific (Tokyo) Region
	const REGION_SA_EAST_1 			= 'ec2.sa-east-1.amazonaws.com'; // Endpoint located in the South America (Sao Paulo) Region
	
	public static function factory($config) {
		$config = Inspector::prepareConfig($config, array(
			'base_url' => '{{scheme}}://{{region}}',
			'version' => '2011-12-15',
			'region' => self::REGION_US_EAST_1,
			'scheme' => 'https'				
			),
			array('access_key', 'secret_key', 'region', 'version', 'scheme')
		);
		
		$config->set('cache.key_filter', 'query=Timestamp, Signature');
		
		$signature = new SignatureV2($config->get('access_key'), $config->get('secret_key'));
		$client = new self(
			$config->get('base_url'),
			$config->get('access_key'),
			$config->get('secret_key'),
			$config->get('version'),
			$signature
		);
		$client->setConfig($config);
		
		$client->getEventManager()->attach(
			new QueryStringAuthPlugin($signature, $config->get('version')),
			-9999
		);
		
		$client->getEventManager()->attach(new ExponentialBackoffPlugin());
		
		return $client;
	}
}