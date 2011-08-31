<?php

namespace Guzzle\Aws\Mws\Model\Feed;

use Guzzle\Aws\Mws\Model\Feed\ProductFeed\AbstractProduct;

/**
 * Product feed builder
 *
 * This feed adds or updates products listed in amazon on
 * your seller account.
 *
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class ProductFeed extends AbstractFeed
{

    /**
     * {@inheritdoc}
     */
    protected $feedType = 'Product';

    /**
     * Add product to feed
     *
     * @param AbstractProduct $product
     * 
     * @return ProductFeed
     */
    public function addProduct(AbstractProduct $product)
    {
        $this->xml->startElement('Message');
        $this->xml->writeElement('MessageID', $this->messageCount);
        $this->xml->writeElement('OperationType', 'Update');

        $product->writeXml();

        $this->xml->endElement();
        $this->messageCount++;

        return $this;
    }

}