<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * LengthDimension data type
 * 
 * Used when specifying a length
 * 
 * Example:
 * <Length unitOfMeasure="IN">12</Length>
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class LengthDimension extends AbstractDimension
{

    /**
     * {@inheritdoc}
     */
    protected $unitsOfMeasure = array(
        'MM',
        'CM',
        'M',
        'IN',
        'FT'
    );
}