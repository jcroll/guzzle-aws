<?php

namespace Guzzle\Aws\Mws\Model\Feed\OrderFulfillmentFeed;

use Guzzle\Aws\Mws\Model\Feed\AbstractFeedItem;

/**
 * Order fulfillment feed item
 * 
 * Represents a single <OrderFulfillment> node in an order fulfillment feed
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class OrderFulfillment extends AbstractFeedItem
{

    /**
     * @param string $value
     * 
     * @return OrderFulfillment 
     */
    public function setAmazonOrderId($value)
    {
        return $this->set('AmazonOrderID', $value);
    }

    /**
     * @param string $value
     * 
     * @return OrderFulfillment 
     */
    public function setMerchantOrderId($value)
    {
        return $this->set('MerchantOrderID', $value);
    }

    /**
     * @param string $value
     * 
     * @return OrderFulfillment 
     */
    public function setMerchantFulfillmentId($value)
    {
        return $this->set('MerchantFulfillmentID', $value);
    }

    /**
     * @param \DateTime $value
     * 
     * @return OrderFulfillment 
     */
    public function setFulfillmentDate(\DateTime $value)
    {
        return $this->set('FulfillmentDate', $value);
    }

    /**
     * @param string $value
     * 
     * @return OrderFulfillment 
     */
    public function setCarrierCode($value)
    {
        if (!in_array($value, array(
                'USPS',
                'UPS',
                'FedEx',
                'DHL',
                'Fastway',
                'GLS',
                'GO!',
                'Hermes Logistik Gruppe',
                'Royal Mail',
                'Parcelforce',
                'City Link',
                'TNT',
                'Target',
                'SagawaExpress',
                'NipponExpress',
                'YamatoTransport'
            ))) {
            throw new \InvalidArgumentException('Invalid carrier code');
        }

        return $this->set('CarrierCode', $value);
    }

    /**
     * @param string $value
     * 
     * @return OrderFulfillment
     */
    public function setCarrierName($value)
    {
        return $this->set('CarrierName', $value);
    }

    /**
     * @param string $value
     * 
     * @return OrderFulfillment 
     */
    public function setShippingMethod($value)
    {
        return $this->set('ShippingMethod', $value);
    }

    /**
     * @param string $value
     * 
     * @return OrderFulfillment 
     */
    public function setShipperTrackingNumber($value)
    {
        return $this->set('ShipperTrackingNumber', $value);
    }

    /**
     * Write XML output
     */
    public function writeXml()
    {
        $this->xml->startElement('OrderFulfillment');
        if ($this->get('AmazonOrderID')) {
            $this->writeNode('AmazonOrderID');
        } else if ($this->get('MerchantOrderID')) {
            $this->writeNode('MerchantOrderID');
        }
        $this
            ->writeNode('MerchantFulfillmentID')
            ->writeNode('FulfillmentDate');

        $this->xml->startElement('FulfillmentData');

        if ($this->get('CarrierCode')) {
            $this->writeNode('CarrierCode');
        } else if ($this->get('CarrierName')) {
            $this->writeNode('CarrierName');
        }

        $this
            ->writeNode('ShippingMethod')
            ->writeNode('ShipperTrackingNumber');
        $this->xml->endElement(); // end FulfillmentData

        $this->xml->endElement(); // end OrderFulfillment
    }

}
