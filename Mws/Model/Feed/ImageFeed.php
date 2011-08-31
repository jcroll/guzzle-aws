<?php

namespace Guzzle\Aws\Mws\Model\Feed;

use Guzzle\Aws\Mws\Model\Feed\ImageFeed\Image;

/**
 * Image feed class
 * 
 * Used for populating product images on amazon product listings
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class ImageFeed extends AbstractFeed
{

    /**
     * {@inheritdoc}
     */
    protected $feedType = 'ProductImage';

    /**
     * Add image to feeed
     * 
     * @param Image $image
     * 
     * @return ImageFeed 
     */
    public function addImage(Image $image)
    {
        $this->xml->startElement('Message');
        $this->xml->writeElement('MessageID', $this->messageCount);
        $this->xml->writeElement('OperationType', 'Update');

        $image->writeXml();

        $this->xml->endElement();
        $this->messageCount++;

        return $this;
    }

}