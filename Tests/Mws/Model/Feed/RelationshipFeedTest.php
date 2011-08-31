<?php

namespace Guzzle\Aws\Tests\Mws\Model\Feed;

use Guzzle\Aws\Mws\Model\Feed\RelationshipFeed\Relationship;
use Guzzle\Aws\Mws\Model\Feed\Schema\DataType;
use Guzzle\Tests\GuzzleTestCase;

class RelationshipFeedTest extends GuzzleTestCase
{
    public function testRelationshipFeed()
    {
        $client = $this->getServiceBuilder()->get('test.mws');
        $feed = $client->getFeed('relationship');
        
        $this->assertInstanceOf('Guzzle\Aws\Mws\Model\Feed\RelationshipFeed', $feed);
        
        $dom = new \DOMDocument();
        $dom->loadXML($feed->toString());
        
        $this->assertSelectEquals('AmazonEnvelope MessageType', 'Relationship', true, $dom, null, false);
        $this->assertInternalType('string', $feed->__toString());
    }
    
    /**
     * @depends testRelationshipFeed
     */
    public function testAddRelationship()
    {
        $client = $this->getServiceBuilder()->get('test.mws');
        $feed = $client->getFeed('relationship');
        
        $relationship = new Relationship($feed->getXml());
        $relationship->setParentSku('ASDF');
        $relationship->addRelation(DataType\Relation::factory('ASDF_M', 'Variation'));
            
        $feed->addRelationship($relationship);
        
        $dom = new \DOMDocument();
        $dom->loadXML($feed->toString());
        
        $this->assertSelectEquals('AmazonEnvelope Message MessageID', '1', true, $dom, null, false);
        $this->assertSelectEquals('AmazonEnvelope Message OperationType', 'Update', true, $dom, null, false);
        $this->assertSelectCount('AmazonEnvelope Message Relationship', 1, $dom, null, false);
    }
}