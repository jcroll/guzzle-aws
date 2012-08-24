<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * AmperageDimension data type
 * 
 * Used when specifying amperage
 * 
 * Example:
 * <Amperage unitOfMeasure="amps">10</Amperage>
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class AmperageDimension extends AbstractDimension
{

    protected $unitsOfMeasure = array(
        'amps',
        'kiloamps',
        'microamps',
        'milliamps',
        'nanoamps',
        'picoamps'
    );
}