<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * TemperatureRatingDimension data type
 * 
 * Used when specifying a temperature rating
 * 
 * Example:
 * <Temperature unitOfMeasure="degrees-farenheit">100</Temperature>
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class TemperatureRatingDimension extends AbstractDimension
{

    protected $unitsOfMeasure = array(
        'degrees-celsius',
        'degrees-fahrenheit',
        'kelvin'
    );
}