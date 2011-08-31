<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * VolumeDimension data type
 * 
 * Used when specifying a volume
 * 
 * Example:
 * <Volume unitOfMeasure="gallon">10</Volume>
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class VolumeDimension extends AbstractDimension
{

    /**
     * {@inheritdoc}
     */
    protected $unitsOfMeasure = array(
        'cubic-cm',
        'cubic-ft',
        'cubic-in',
        'cubic-m',
        'cubic-yd',
        'cup',
        'fluid-oz',
        'gallon',
        'liter',
        'milliliter',
        'ounce',
        'pint',
        'quart'
    );
}