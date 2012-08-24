<?php

namespace Guzzle\Aws\Mws\Model\Feed\RelationshipFeed;

use Guzzle\Aws\Mws\Model\Feed\AbstractFeedItem;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * Relationship feed item
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class Relationship extends AbstractFeedItem
{
    /**
     * @param string $value
     * 
     * @return Relationship
     */
    public function setParentSku($value)
    {
        return $this->set('ParentSKU', $value);
    }
    
    /**
     * @param DataType\Relation $relation
     * 
     * @return Relationship
     */
    public function addRelation(DataType\Relation $relation)
    {
        return $this->add('Relation', $relation);
    }
    
    /**
     * Write XML output to feed
     * 
     * @return Relationship 
     */
    public function writeXml()
    {
        $this->xml->startElement('Relationship');
        $this
            ->writeNode('ParentSKU')
            ->writeNode('Relation');
        $this->xml->endElement();

        return $this;
    }
}