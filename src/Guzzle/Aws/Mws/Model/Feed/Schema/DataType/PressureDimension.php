<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * PressureDimension data type
 * 
 * Used when specifying a pressure
 * 
 * Example:
 * <Pressure unitOfMeasure="bars">2</Pressure>
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class PressureDimension extends AbstractDimension
{

    protected $unitsOfMeasure = array(
        'bars'
    );
}