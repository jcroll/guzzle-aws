<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * DataType interface
 * 
 * All data types implement this interface, used
 * internally to identify data types
 */
interface DataTypeInterface
{
    public function writeXml(\XMLWriter $xml, $nodeName);
}