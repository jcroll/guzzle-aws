<?php

namespace Guzzle\Aws\Tests\ProductAdvertising\Command;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Aws\ProductAdvertising\ProductAdvertisingClient;

class ItemSearchTest extends GuzzleTestCase
{

    protected function getClient()
    {
        return ProductAdvertisingClient::factory(array(
            'access_key' => 'foo',
            'secret_key' => 'foo',
            'associate_tag' => 'foo'
        ));
    }

    public function testItemSearch()
    {
        $client = $this->getClient();
        $command = $client->getCommand('item_search')
            ->setActor('Foo')
            ->setArtist('Foo')
            ->setAudienceRating('Foo')
            ->setAuthor('Foo')
            ->setAvailability('Available')
            ->setBrand('Foo')
            ->setBrowseNode(1234)
            ->setCity('Foo')
            ->setComposer('Foo')
            ->setCondition('New')
            ->setDirector('Foo')
            ->setIncludeReviewsSummary('Foo')
            ->setItemPage(1)
            ->setKeywords('Foo')
            ->setManufacturer('Foo')
            ->setMaximumPrice(9.99)
            ->setMerchantId('Foo')
            ->setMinimumPrice(1.99)
            ->setNeighborhood('Dallas')
            ->setOrchestra('Foo')
            ->setPower('Foo')
            ->setPublisher('Foo')
            ->setRelatedItemPage(1)
            ->setRelationshipType('Episode')
            ->setReviewSort('HelpfulVotes')
            ->setSearchIndex('All')
            ->setSort('Foo')
            ->setTagPage('Foo')
            ->setTagsPerPage(10)
            ->setTagSort('FirstUsed')
            ->setTitle('Foo')
            ->setTruncateReviewsAt(1234)
            ->setVariationPage(1)
            ->setResponseGroup('Accessories');

        $this->setMockResponse($client, 'ItemSearchResponse');
        $command->execute();
    }

    /**
     * @depends testItemSearch
     */
    public function testSetAvailability()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->getClient()->getCommand('item_search')->setAvailability('Foo');
    }

    /**
     * @depends testItemSearch
     */
    public function testSetCondition()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->getClient()->getCommand('item_search')->setCondition('Foo');
    }

    /**
     * @depends testItemSearch
     */
    public function testSetItemPage()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->getClient()->getCommand('item_search')->setItemPage('Foo');
    }

    /**
     * @depends testItemSearch
     */
    public function testSetRelationshipType()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->getClient()->getCommand('item_search')->setRelationshipType('Foo');
    }

    /**
     * @depends testItemSearch
     */
    public function testSetReviewSort()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->getClient()->getCommand('item_search')->setReviewSort('Foo');
    }

    /**
     * @depends testItemSearch
     */
    public function testSetSearchIndex()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->getClient()->getCommand('item_search')->setSearchIndex('Foo');
    }

    /**
     * @depends testItemSearch
     */
    public function testSetTagSort()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->getClient()->getCommand('item_search')->setTagSort('Foo');
    }

    /**
     * @depends testItemSearch
     */
    public function testSetResponseGroup()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->getClient()->getCommand('item_search')->setResponseGroup('Foo');
    }

}