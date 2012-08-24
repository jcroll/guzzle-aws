<?php

namespace Guzzle\Aws\Mws\Model\Feed\Schema\DataType;

/**
 * RebateType data type
 * 
 * Used when specifying a product rebate type
 * 
 * Example:
 * <Rebate>
 *   <RebateStartDate>2011-01-01T00:00:00</RebateStartDate>
 *   <RebateEndDate>2011-01-02T00:00:00</RebateEndDate>
 *   <RebateMessage>$20 Mail-in rebate<RebateMessage>
 *   <RebateName>Sample Rebate</RebateName>
 * </Rebate>
 * 
 * @author Harold Asbridge <harold@shoebacca.com>
 */
class RebateType extends AbstractDataType
{

    /**
     * Init object
     * 
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param string $message
     * @param string $name 
     */
    public function __construct(\DateTime $startDate = null, \DateTime $endDate = null, $message = null, $name = null)
    {
        if ($startDate !== null) {
            $this->setRebateStartDate($startDate);
        }
        if ($endDate !== null) {
            $this->setRebateEndDate($endDate);
        }
        if ($message !== null) {
            $this->setRebateMessage($message);
        }
        if ($name !== null) {
            $this->setRebateName($name);
        }
    }

    /**
     * Set rebate start date
     * 
     * @param \DateTime $value
     * 
     * @return RebateType 
     */
    public function setRebateStartDate(\DateTime $value)
    {
        return $this->set('startDate', $value);
    }

    /**
     * Set rebate end date
     * 
     * @param \DateTime $value
     * 
     * @return RebateType 
     */
    public function setRebateEndDate(\DateTime $value)
    {
        return $this->set('endDate', $value);
    }

    /**
     * Set rebate message
     * 
     * @param string $value
     * 
     * @return RebateType
     */
    public function setRebateMessage($value)
    {
        if (strlen($value) > 250) {
            throw new \InvalidArgumentException('Rebate message too long');
        }

        return $this->set('message', $value);
    }

    /**
     * Set rebate name
     * 
     * @param string $value
     * 
     * @return RebateType
     */
    public function setRebateName($value)
    {
        if (strlen($value) > 40) {
            throw new \InvalidArgumentException('Rebate name too long');
        }

        return $this->set('name', $value);
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
        if ($startDate = $this->get('startDate')) {
            $xml->writeElement('RebateStartDate', $startDate->format('c'));
        }
        if ($endDate = $this->get('endDate')) {
            $xml->writeElement('RebateEndDate', $endDate->format('c'));
        }
        if ($message = $this->get('message')) {
            $xml->writeElement('RebateMessage', $message);
        }
        if ($name = $this->get('name')) {
            $xml->writeElement('RebateName', $name);
        }
        $xml->endElement();
    }

}