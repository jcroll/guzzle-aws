<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * ConditionInfo data type
 * 
 * Used for specifying item condition
 * 
 * Example:
 * <Condition>
 *   <ConditionType>New</ConditionType>
 *   <ConditionNote>Unopened Box</ConditionNote>
 * </Condition>
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class ConditionInfo extends AbstractDataType
{

    /**
     * Init object
     * 
     * @param string $conditionType
     * @param string $conditionNote 
     */
    public function __construct($conditionType = null, $conditionNote = null)
    {
        if ($conditionType !== null) {
            $this->setConditionType($conditionType);
        }
        if ($conditionNote !== null) {
            $this->setConditionNote($conditionNote);
        }
    }

    /**
     * @param string $value
     * 
     * @return ConditionInfo 
     */
    public function setConditionType($value)
    {
        if (!in_array($value, array(
                'New',
                'UsedLikeNew',
                'UsedVeryGood',
                'UsedGood',
                'UsedAcceptable',
                'CollectibleLikeNew',
                'CollectibleVeryGood',
                'CollectibleGood',
                'CollectibleAcceptable',
                'Refurbished',
                'Club'
            ))) {
            throw new \InvalidArgumentException('Invalid condition type');
        }

        return $this->set('ConditionType', $value);
    }

    /**
     * @param string $value
     * 
     * @return ConditionInfo
     */
    public function setConditionNote($value)
    {
        return $this->set('ConditionNote', $value);
    }

    /**
     * Write XML output
     * 
     * @param \XMLWriter $xml
     * @param string $nodeName 
     */
    public function writeXml(\XMLWriter $xml, $nodeName)
    {
        $xml->startElement($nodeName);
        if ($conditionType = $this->get('ConditionType')) {
            $xml->writeElement('ConditionType', $conditionType);
        }
        if ($conditionNote = $this->get('ConditionNote')) {
            $xml->writeElement('ConditionNote', $conditionNote);
        }
        $xml->endElement();
    }

}