<?php

/**
 * @package Guzzle PHP <http://www.guzzlephp.org>
 * @license See the LICENSE file that was distributed with this source code.
 */

namespace Guzzle\Aws\Mws\Model\Feed;

use Guzzle\Aws\Mws\Model\Feed\OrderFulfillmentFeed\OrderFulfillment;

/**
 * Order fulfillment feed
 *
 * This feed will update amazon orders with the provided tracking number(s),
 * which will then cause amazon to send a notification email to the customer.
 *
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class OrderFulfillmentFeed extends AbstractFeed
{

    /**
     * {@inheritdoc}
     */
    protected $feedType = 'OrderFulfillment';

    /**
     * Add fulfillment to feed
     *
     * @param OrderFulfillment $orderFulfillment
     *
     * @return OrderFulfillment
     */
    public function addFulfillment(OrderFulfillment $orderFulfillment)
    {
        $this->xml->startElement('Message');
        $this->xml->writeElement('MessageID', $this->messageCount);
        $this->xml->writeElement('OperationType', 'Update');

        $orderFulfillment->writeXml();

        $this->xml->endElement();
        $this->messageCount++;

        return $this;
    }

}