<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * ClothingSizeDimension data type
 * 
 * Used for specifying a clothing size
 * 
 * Example:
 * <Length unitOfMeasure="IN">12</Length>
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class ClothingSizeDimension extends AbstractDimension
{

    protected $unitsOfMeasure = array(
        'IN',
        'CM'
    );
}