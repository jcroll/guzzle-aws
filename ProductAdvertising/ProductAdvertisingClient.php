<?php

namespace Guzzle\Aws\ProductAdvertising;

use Guzzle\Aws\AbstractClient;
use Guzzle\Aws\QueryStringAuthPlugin;
use Guzzle\Aws\Signature\SignatureV2;
use Guzzle\Common\Inspector;
use Guzzle\Common\Inflector;

/**
 * Product Advertising API client class
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 * @see http://docs.amazonwebservices.com/AWSECommerceService/2011-08-01/DG/
 */
class ProductAdvertisingClient extends AbstractClient
{
    /**
     * API version, used for signature
     */
    const VERSION = '2011-08-01';

    /**
     * Get client instance
     * 
     * @param array $config
     * 
     * @return ProductAdvertisingClient
     */
    public static function factory($config)
    {
        $defaults = array(
            'base_url' => 'http://webservices.amazon.com/onca/xml?Service=AWSECommerceService',
            'version' => self::VERSION
        );
        $required = array('access_key', 'secret_key');
        $config = Inspector::prepareConfig($config, $defaults, $required);

        $signature = new SignatureV2($config->get('access_key'), $config->get('secret_key'));
        $client = new self(
                $config->get('base_url'),
                $config->get('access_key'),
                $config->get('secret_key'),
                $config->get('version'),
                $signature
        );
        $client->setConfig($config);

        // Sign the request last
        $client->getEventManager()->attach(
            new QueryStringAuthPlugin($signature, $config->get('version')), -9999
        );

        return $client;
    }

}