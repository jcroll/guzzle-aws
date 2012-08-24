<?php
/**
 * @package Guzzle PHP <http://www.guzzlephp.org>
 * @license See the LICENSE file that was distributed with this source code.
 */

namespace Guzzle\Aws\S3;

use Guzzle\Common\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Plugin to sign requests for Amazon S3 before sending
 *
 * @author Michael Dowling <michael@guzzlephp.org>
 */
class SignS3RequestPlugin implements EventSubscriberInterface
{
    /**
     * @var S3Signature
     */
    private $signature;

    /**
     * Construct a new request signing plugin
     *
     * @param S3Signature $signature Signature object used to sign requests
     */
    public function __construct(S3Signature $signature)
    {
        $this->signature = $signature;
    }

    /**
     * Get the signature object used to sign requests
     *
     * @return S3Signature
     */
    public function getSignature()
    {
        return $this->signature;
    }
    
    /**
     * {@inheritdoc}
     */
    public function update(Subject $subject, $event, $context = null)
    {
        if ($event == 'request.before_send') {
            
            $path = $subject->getResourceUri() ?: '';

            $headers = array_change_key_case($subject->getHeaders()->getAll());
            if (!array_key_exists('Content-Length', $headers)) {
                $headers['Content-Type'] = $subject->getHeader('Content-Type');
            }

            $canonicalizedString = $this->signature->createCanonicalizedString(
                $headers, $path, $subject->getMethod()
            );

            $subject->setHeader(
                'Authorization',
                'AWS ' . $this->signature->getAccessKeyId(). ':'
                    . $this->signature->signString($canonicalizedString)
            );
        }
    }

  public function onBeforeSend(Event $event) {
    $subject = $event['request'];
    $path = $subject->getUrl() ? : '';
    $headers = array_change_key_case($subject->getHeaders()->getAll());
    if (!array_key_exists('Content-Length', $headers)) {
      $headers['Content-Type'] = $subject->getHeader('Content-Type');
    }

    $canonicalizedString = $this->signature->createCanonicalizedString(
      $headers, $path, $subject->getMethod()
    );

    $subject->setHeader(
      'Authorization',
      'AWS ' . $this->signature->getAccessKeyId(). ':'
            . $this->signature->signString($canonicalizedString)
    );
  }

  public static function getSubscribedEvents() {
    return array(
      'request.before_send'      => 'onBeforeSend'
    );
  }
}