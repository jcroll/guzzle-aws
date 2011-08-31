<?php

namespace Guzzle\Aws\Tests\ProductAdvertising\Command;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\ProductAdvertising\ProductAdvertisingClient;

class ItemLookupTest extends GuzzleTestCase
{
    protected function getClient()
    {
        return ProductAdvertisingClient::factory(array(
            'access_key'    => 'foo',
            'secret_key'    => 'foo',
            'associate_tag' => 'foo'
        ));
    }
    
    public function testItemLookup()
    {
        $client = $this->getClient();
        
        $command = $client->getCommand('item_lookup');
        $command
            ->setCondition('New')
            ->setIdType('UPC')
            ->setIncludeReviewsSummary(1)
            ->setItemId(12345)
            ->setMerchantId('ASDF')
            ->setRelatedItemPage(1)
            ->setRelationshipType('AuthorityTitle')
            ->setReviewPage(1)
            ->setReviewSort('HelpfulVotes')
            ->setSearchIndex('All')
            ->setTagPage(1)
            ->setTagSort('FirstUsed')
            ->setTruncateReviewsAt(1)
            ->setVariationPage(1)
            ->setResponseGroup('Accessories');
        
        $this->assertInstanceOf('Guzzle\Aws\ProductAdvertising\Command\ItemLookup', $command);
        
        $this->setMockResponse($client, 'ItemLookupResponse');
        $command->execute();
    }
    
    /**
     * @depends testItemLookup
     */
    public function testSetCondition()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->getClient()->getCommand('item_lookup')
            ->setCondition('Foo');
    }
    
    /**
     * @depends testItemLookup
     */
    public function testSetIdType()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->getClient()->getCommand('item_lookup')
            ->setIdType('Foo');
    }
    
    /**
     * @depends testItemLookup
     */
    public function testSetRelationshipType()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->getClient()->getCommand('item_lookup')
            ->setRelationshipType('Foo');
    }
    
    /**
     * @depends testItemLookup
     */
    public function testSetReviewSort()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->getClient()->getCommand('item_lookup')
            ->setReviewSort('Foo');
    }
    
    /**
     * @depends testItemLookup
     */
    public function testSetSearchIndex()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->getClient()->getCommand('item_lookup')
            ->setSearchIndex('Foo');
    }
    
    /**
     * @depends testItemLookup
     */
    public function testSetTagSort()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->getClient()->getCommand('item_lookup')
            ->setTagSort('Foo');
    }
    
    /**
     * @depends testItemLookup
     */
    public function testSetResponseGroup()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->getClient()->getCommand('item_lookup')
            ->setResponseGroup('Foo');
    }
}