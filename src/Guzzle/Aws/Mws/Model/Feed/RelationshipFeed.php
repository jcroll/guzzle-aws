<?php

namespace Guzzle\Aws\Mws\Model\Feed;

class RelationshipFeed extends AbstractFeed
{
    /**
     * {@inheritdoc}
     */
    protected $feedType = 'Relationship';
    
    /**
     * Add relationship to feed
     * 
     * @param RelationshipFeed\Relationship $relationship
     * 
     * @return RelationshipFeed 
     */
    public function addRelationship(RelationshipFeed\Relationship $relationship)
    {
        $this->xml->startElement('Message');
        $this->xml->writeElement('MessageID', $this->messageCount);
        $this->xml->writeElement('OperationType', 'Update');

        $relationship->writeXml();

        $this->xml->endElement();
        $this->messageCount++;

        return $this;
    }
}