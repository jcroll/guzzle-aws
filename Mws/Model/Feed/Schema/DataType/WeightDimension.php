<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * WeightDimension data type
 * 
 * Used when specifying item weight
 * 
 * Example:
 * <Weight unitOfMeasure="LB">1.0</Weight>
 * 
 * @author Harold Asbridge
 */
class WeightDimension extends AbstractDimension
{

    /**
     * {@inheritdoc}
     */
    protected $unitsOfMeasure = array(
        'GR',
        'KG',
        'OZ',
        'LB',
        'MG'
    );
}