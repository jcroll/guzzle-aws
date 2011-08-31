<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * DegreeDimension data type
 * 
 * Used when specifying a length
 * 
 * Example:
 * <Angle unitOfMeasure="degrees">90</Angle>
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class DegreeDimension extends AbstractDimension
{
    protected $unitsOfMeasure = array(
        'degrees'
    );
}