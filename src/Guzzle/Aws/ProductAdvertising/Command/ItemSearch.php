<?php

namespace Guzzle\Aws\ProductAdvertising\Command;

/**
 * The ItemSearch operation returns items that satisfy the search criteria, 
 * including one or more search indices.
 * 
 * ItemSearch returns up to ten search results at a time. When condition equals 
 * "All," ItemSearch returns up to three offers per condition (if they exist), 
 * for example, three new, three used, three refurbished, and three collectible 
 * items. Or, for example, if there are no collectible or refurbished offers, 
 * ItemSearch returns three new and three used offers.
 * 
 * Because there are thousands of items in each search index, ItemSearch 
 * requires that you specify the value for at least one parameter in addition to
 * a search index. The additional parameter value must reference items within 
 * the specified search index. For example, you might specify a browse node 
 * (BrowseNode is an ItemSearch parameter), Harry Potter Books, within the Books
 * product category. You would not get results, for example, if you specified 
 * the search index to be Automotive and the browse node to be Harry Potter 
 * Books. In this case, the parameter value is not associated with the search 
 * index value.
 * 
 * The ItemPage parameter enables you to return a specified page of results. 
 * The maximum ItemPage number that can be returned is 10. An error is returned 
 * if you try to access higher numbered pages. If you do not include ItemPage 
 * in your request, the first page will be returned by default. There can be up 
 * to ten items per page.
 * 
 * ItemSearch is the operation that is used most often in requests. In general, 
 * when trying to find an item for sale, you use this operation.
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 * @see http://docs.amazonwebservices.com/AWSECommerceService/2011-08-01/DG/
 */
class ItemSearch extends AbstractProductAdvertisingCommand
{

    /**
     * {@inheritdoc}
     */
    protected $operation = 'ItemSearch';

    /**
     * @param string $value
     * 
     * @return ItemSearch 
     */
    public function setActor($value)
    {
        return $this->set('Actor', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setArtist($value)
    {
        return $this->set('Artist', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setAudienceRating($value)
    {
        return $this->set('AudienceRating', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setAuthor($value)
    {
        return $this->set('Author', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setAvailability($value)
    {
        if (!in_array($value, array(
                'Available'
            ))) {
            throw new \InvalidArgumentException('Invalid availability value');
        }

        return $this->set('Availability', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setBrand($value)
    {
        return $this->set('Brand', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setBrowseNode($value)
    {
        return $this->set('BrowseNode', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch 
     */
    public function setCity($value)
    {
        return $this->set('City', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setComposer($value)
    {
        return $this->set('Composer', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch
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
     * @return ItemSearch
     */
    public function setDirector($value)
    {
        return $this->set('Director', $value);
    }

    /**
     * @param bool $value
     * 
     * @return ItemSearch 
     */
    public function setIncludeReviewsSummary($value)
    {
        return $this->set('IncludeReviewsSummary', (bool) $value);
    }

    /**
     * @param int $value
     * 
     * @return ItemSearch
     */
    public function setItemPage($value)
    {
        if ($value < 1 || $value > 10) {
            throw new \InvalidArgumentException('Out of range value for item page');
        }

        return $this->set('ItemPage', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setKeywords($value)
    {
        return $this->set('Keywords', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setManufacturer($value)
    {
        return $this->set('Manufacturer', $value);
    }

    /**
     * @param float $value
     * 
     * @return ItemSearch 
     */
    public function setMaximumPrice($value)
    {
        return $this->set('MaximumPrice', round($value * 100));
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setMerchantId($value)
    {
        return $this->set('MerchantId', $value);
    }

    /**
     * @param float $value
     * 
     * @return ItemSearch 
     */
    public function setMinimumPrice($value)
    {
        return $this->set('MinimumPrice', round($value * 100));
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setNeighborhood($value)
    {
        return $this->set('Neighborhood', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setOrchestra($value)
    {
        return $this->set('Orchestra', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setPower($value)
    {
        return $this->set('Power', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch 
     */
    public function setPublisher($value)
    {
        return $this->set('Publisher', $value);
    }

    /**
     * @param int $value
     * 
     * @return ItemSearch
     */
    public function setRelatedItemPage($value)
    {
        return $this->set('RelatedItemPage', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch
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
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setReviewSort($value)
    {
        if (!in_array($value, array(
                '-HelpfulVotes',
                'HelpfulVotes',
                '-OverallRating',
                'OverallRating',
                'Rank',
                '-Rank',
                '-SubmissionDate',
                'SubmissionDate'
            ))) {
            throw new \InvalidArgumentException('Invalid review sort');
        }

        return $this->set('ReviewSort', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch
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
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setSort($value)
    {
        return $this->set('Sort', $value);
    }

    /**
     * @param int $value
     * 
     * @return ItemSearch
     */
    public function setTagPage($value)
    {
        return $this->set('TagPage', $value);
    }

    /**
     * @param int $value
     * 
     * @return ItemSearch
     */
    public function setTagsPerPage($value)
    {
        return $this->set('TagsPerPage', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch
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
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setTitle($value)
    {
        return $this->set('Title', $value);
    }

    /**
     * @param int $value
     * 
     * @return ItemSearch
     */
    public function setTruncateReviewsAt($value)
    {
        return $this->set('TruncateReviewsAt', $value);
    }

    /**
     * @param int $value
     * 
     * @return ItemSearch
     */
    public function setVariationPage($value)
    {
        return $this->set('VariationPage', $value);
    }

    /**
     * @param string $value
     * 
     * @return ItemSearch
     */
    public function setResponseGroup($value)
    {
        if (!in_array($value, array(
                'Accessories',
                'BrowseNodes',
                'EditorialReview',
                'ItemAttributes',
                'ItemIds',
                'Large',
                'Medium',
                'OfferFull',
                'Offers',
                'OfferSummary',
                'Reviews',
                'RelatedItems',
                'SearchBins',
                'Similarities',
                'Tracks',
                'Variations',
                'VariationSummary'
            ))) {
            throw new \InvalidArgumentException('Invalid response group');
        }

        return $this->set('ResponseGroup', $value);
    }

}

