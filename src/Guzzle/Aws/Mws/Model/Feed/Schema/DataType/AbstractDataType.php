<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * XML Schema Data Type base class
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
abstract class AbstractDataType implements DataTypeInterface
{

    /**
     * @var array Internal data array
     */
    protected $data;

    /**
     * Factory method
     * 
     * @return AbstractDataType
     */
    public static function factory()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return new static();
        } else {
            $r = new \ReflectionClass(get_called_class());
            return $r->newInstanceArgs($args);
        }
    }

    // @codeCoverageIgnoreStart
    /**
     * Empty constructor, to avoid errors from ReflectionClass for any types that don't need a constructor
     */
    public function __construct()
    {
        
    }

    // @codeCoverageIgnoreEnd

    /**
     * Set value
     * 
     * @param string $key
     * @param mixed $value
     * 
     * @return AbstractDataType 
     */
    public function set($key, $value)
    {
        $this->data[$key] = $value;

        return $this;
    }

    /**
     * Get value
     * 
     * @param string $key
     * 
     * @return mixed 
     */
    public function get($key)
    {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }

}