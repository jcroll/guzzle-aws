<?php

namespace Guzzle\Aws\Mws\Model\Feed\ImageFeed;

use Guzzle\Aws\Mws\Model\Feed\AbstractFeedItem;

/**
 * Image feed item
 * 
 * Represents an individual <ProductImage> node in a product image feed
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class Image extends AbstractFeedItem
{

    /**
     * Set SKU
     * 
     * @param string $value
     * 
     * @return Image 
     */
    public function setSku($value)
    {
        return $this->set('SKU', $value);
    }

    /**
     * Set image type
     * 
     * @param string $value
     * 
     * @return Image
     */
    public function setImageType($value)
    {
        if (!in_array($value, array(
                'Main',
                'Swatch',
                'PT1',
                'PT2',
                'PT3',
                'PT4',
                'PT5',
                'PT6',
                'PT7',
                'PT8',
                'Search'
            ))) {
            throw new \InvalidArgumentException('Invalid image type');
        }

        return $this->set('ImageType', $value);
    }

    /**
     * Set image location
     * 
     * @param string $value URL of image
     * 
     * @return Image
     */
    public function setImageLocation($value)
    {
        return $this->set('ImageLocation', $value);
    }

    /**
     * Write XML output
     */
    public function writeXml()
    {
        $this->xml->startElement('ProductImage');

        $this
            ->writeNode('SKU')
            ->writeNode('ImageType')
            ->writeNode('ImageLocation');

        $this->xml->endElement();
    }

}