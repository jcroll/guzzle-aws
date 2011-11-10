<?php

require_once $_SERVER['GUZZLE'] . '/vendor/Symfony/Component/ClassLoader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'Guzzle' => $_SERVER['GUZZLE'] . '/src',
    'Guzzle\\Tests' => $_SERVER['GUZZLE'] . '/tests'
));
$loader->register();

spl_autoload_register(function($class) {
    if (0 === strpos($class, 'Guzzle\\Aws\\')) {
        $path = implode('/', array_slice(explode('\\', $class), 2)) . '.php';
        require_once __DIR__ . '/../' . $path;
        return true;
    }
});

\Guzzle\Tests\GuzzleTestCase::setMockBasePath(__DIR__ . DIRECTORY_SEPARATOR . 'mock');
\Guzzle\Tests\GuzzleTestCase::setServiceBuilder(\Guzzle\Service\ServiceBuilder::factory(array(
    'test.abstract.aws' => array(
        'class' => '',
        'params' => array(
            'access_key' => '12345',
            'secret_key' => 'abcd'
        )
    ),
    'test.s3' => array(
        'extends' => 'test.abstract.aws',
        'class'   => 'Guzzle.Aws.S3.S3Client',
        'params'  => array(
            'devpay_product_token' => '',
            'devpay_user_token' => ''
        )
    ),
    'test.simple_db' => array(
        'extends' => 'test.abstract.aws',
        'class'   => 'Guzzle.Aws.SimpleDb.SimpleDbClient'
    ),
    'test.sqs' => array(
        'extends' => 'test.abstract.aws',
        'class'   => 'Guzzle.Aws.Sqs.SqsClient'
    ),
    'test.mws' => array(
        'extends' => 'test.abstract.aws',
        'class'   => 'Guzzle.Aws.Mws.MwsClient',
        'params'  => array(
            'merchant_id' => 'ABCDE',
            'marketplace_id' => 'FGHIJ',
            'application_name' => 'GuzzleTest',
            'application_version' => '0.1',
            'base_url' => 'https://mws.amazonservices.com/'
        )
    )
)));