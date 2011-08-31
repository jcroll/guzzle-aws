<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * WattageDimension data type
 * 
 * Used when specifying a wattage
 * 
 * Example:
 * <Wattage unitOfMeasure="watts">10</Wattage>
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class WattageDimension extends AbstractDimension
{

    protected $unitsOfMeasure = array(
        'watts'
    );
}