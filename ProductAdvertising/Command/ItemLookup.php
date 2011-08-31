<?php

namespace Guzzle\Aws\ProductAdvertising\Command;

/**
 * Given an Item identifier, the ItemLookup operation returns some or all of 
 * the item attributes, depending on the response group specified in the 
 * request. By default, ItemLookup returns an item’s ASIN, Manufacturer, 
 * ProductGroup, and Title of the item.
 * 
 * ItemLookup supports many response groups, so you can retrieve many different 
 * kinds of product information, called item attributes, including product 
 * reviews, variations, similar products, pricing, availability, images of 
 * products, accessories, and other information.
 * 
 * To look up more than one item at a time, separate the item identifiers by 
 * commas.
 * 
 * @author Harold Asbridge
 * @see http://docs.amazonwebservices.com/AWSECommerceService/2011-08-01/DG/
 */
class ItemLookup extends AbstractProductAdvertisingCommand
{

    /**
     * @var {@inheritdoc}
     */
    protected $operation = 'ItemLookup';

    /**
     * @param string $value
     * 
     * @return ItemLookup
     */
    public function setCondition($value)
    {
        if (!in_array($value, array(
                'New',
                'Used',
                'Collectible',
                'Refurbished',
                'All'
            ))) {
            throw new \InvalidArgumentException('Invalid condition');
        }

        return $this->set('Condition', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemLookup
     */
    public function setIdType($value)
    {
        if (!in_array($value, array(
                'SKU',
                'UPC',
                'EAN',
                'ISBN'
            ))) {
            throw new \InvalidArgumentException('Invalid ID type');
        }

        return $this->set('IdType', $value);
    }

    /**
     * @param bool $value
     * 
     * @return ItemLookup 
     */
    public function setIncludeReviewsSummary($value)
    {
        return $this->set('IncludeReviewsSummary', (bool) $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemLookup
     */
    public function setItemId($value)
    {
        return $this->set('ItemId', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemLookup
     */
    public function setMerchantId($value)
    {
        return $this->set('MerchantId', $value);
    }

    /**
     * @param int $value
     * 
     * @return ItemLookup
     */
    public function setRelatedItemPage($value)
    {
        return $this->set('RelatedItemPage', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemLookup
     */
    public function setRelationshipType($value)
    {
        if (!in_array($value, array(
                'AuthorityTitle',
                'DigitalMusicArranger',
                'DigitalMusicComposer',
                'DigitalMusicConductor',
                'DigitalMusicEnsemble',
                'DigitalMusicLyricist',
                'DigitalMusicPerformer',
                'DigitalMusicPrimaryArtist',
                'DigitalMusicProducer',
                'DigitalMusicRemixer',
                'DigitalMusicSongWriter',
                'Episode',
                'Season',
                'Tracks'
            ))) {
            throw new \InvalidArgumentException('Invalid relationship type');
        }

        return $this->set('RelationshipType', $value);
    }

    /**
     * @param int $value
     * 
     * @return ItemLookup
     */
    public function setReviewPage($value)
    {
        return $this->set('ReviewPage', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemLookup
     */
    public function setReviewSort($value)
    {
        if (!in_array($value, array(
                '-HelpfulVotes',
                'HelpfulVotes',
                '-OverallRating',
                'OverallRating',
                'SubmissionDate'
            ))) {
            throw new \InvalidArgumentException('Invalid review sort');
        }

        return $this->set('ReviewSort', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemLookup
     */
    public function setSearchIndex($value)
    {
        if (!in_array($value, array(
                'All',
                'Apparel',
                'Appliances',
                'ArtsAndCrafts',
                'Automotive',
                'Baby',
                'Beauty',
                'Blended',
                'Books',
                'Classical',
                'DigitalMusic',
                'DVD',
                'Electronics',
                'ForeignBooks',
                'GourmetFood',
                'Grocery',
                'HealthPersonalCare',
                'Hobbies',
                'HomeGarden',
                'HomeImprovement',
                'Industrial',
                'Jewelry',
                'KindleStore',
                'Kitchen',
                'Lighting',
                'Magazines',
                'Miscellaneous',
                'MobileApps',
                'MP3Downloads',
                'Music',
                'MusicalInstruments',
                'MusicTracks',
                'OfficeProducts',
                'OutdoorLiving',
                'Outlet',
                'PCHardware',
                'PetSupplies',
                'Photo',
                'Shoes',
                'Software',
                'SoftwareVideoGames',
                'SportingGoods',
                'Tools',
                'Toys',
                'UnboxVideo',
                'VHS',
                'Video',
                'VideoGames',
                'Watches',
                'Wireless',
                'WirelessAccessories'
            ))) {
            throw new \InvalidArgumentException('Invalid search index');
        }

        return $this->set('SearchIndex', $value);
    }

    /**
     * @param int $value
     * 
     * @return ItemLookup
     */
    public function setTagPage($value)
    {
        return $this->set('TagPage', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemLookup
     */
    public function setTagSort($value)
    {
        if (!in_array($value, array(
                'FirstUsed',
                '- FirstUsed',
                '- LastUsed',
                '- Name'
            ))) {
            throw new \InvalidArgumentException('Invalid tag sort');
        }

        return $this->set('TagSort', $value);
    }

    /**
     * @param int $value
     * 
     * @return ItemLookup
     */
    public function setTruncateReviewsAt($value)
    {
        return $this->set('TruncateReviewsAt', $value);
    }

    /**
     * @param int $value
     * 
     * @return ItemLookup
     */
    public function setVariationPage($value)
    {
        return $this->set('VariationPage', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemLookup
     */
    public function setResponseGroup($value)
    {
        $value = explode(',', $value);

        foreach ($value as $v) {
            if (!in_array($v, array(
                    'Accessories',
                    'BrowseNodes',
                    'EditorialReview',
                    'Images',
                    'ItemAttributes',
                    'ItemIds',
                    'Large',
                    'Medium',
                    'OfferFull',
                    'Offers',
                    'PromotionSummary',
                    'OfferSummary',
                    'RelatedItems',
                    'Reviews',
                    'SalesRank',
                    'Similarities',
                    'Tracks',
                    'VariationImages',
                    'Variations',
                    'VariationSummary'
                ))) {
                throw new \InvalidArgumentException('Invalid response group');
            }
        }

        return $this->set('ResponseGroup', $value);
    }

}