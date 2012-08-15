<?php
/**
 * @package Guzzle PHP <http://www.guzzlephp.org>
 * @license See the LICENSE file that was distributed with this source code.
 */

namespace Guzzle\Aws\S3;

use Guzzle\Common\Event;
use Guzzle\Http\Plugin\AbstractPlugin;
use \Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Plugin to add Amazon DevPay tokens to the Amazon S3 requests
 *
 * @author Michael Dowling <michael@guzzlephp.org>
 */
class DevPayPlugin implements EventSubscriberInterface
{
  private $userToken;
  private $productToken;

  /**
   * Construct a new request signing plugin
   *
   * @param string $userToken User token
   * @param string $productToken Product token
   */
  public function __construct($userToken, $productToken)
  {
    $this->userToken = $userToken;
    $this->productToken = $productToken;
  }

  /**
   * {@inheritdoc}
   * DEPRECATED replaced by onBeforeSend below.
   */
  /*public function update(Subject $subject, $event, $context = null)
  {
    if ($event == 'request.before_send') {
      $subject->setHeader(
        'x-amz-security-token',
        $this->userToken . ', ' . $this->productToken
      );
    }
  }*/

  public function onBeforeSend($event) {
    $event['request']->setHeader(
      'x-amz-security-token',
      $this->userToken . ', ' . $this->productToken
    );
  }

  public static function getSubscribedEvents()
  {
    return array(
      'request.before_send' => 'onBeforeSend'
    );
  }
}