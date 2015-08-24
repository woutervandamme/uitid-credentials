<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 24/08/15
 * Time: 11:29
 */

namespace CultuurNet\UitidCredentials\Entities;

class Consumer
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $secret;

    /**
     * @var string
     */
    protected $name;

    /**
     * @param $key
     * @param $secret
     * @param $name
     */
    public function __construct($key = null, $secret = null, $name = null)
    {
        $this->key = $key;
        $this->secret = $secret;
        $this->name = $name;
    }

    /**
     * @param string $key
     */
    protected function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @param string $secret
     */
    protected function setSecret($secret)
    {
        $this->secret = $secret;
    }

    /**
     * @param string $name
     */
    protected function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param \SimpleXMLElement $xmlElement
     * @return Consumer
     */
    public function parseFromXml(\SimpleXMLElement $xmlElement)
    {
        $consumer = new self();

        if (!empty($xmlElement->key)) {
            $consumer->setKey((string)$xmlElement->key);
        }

        if (!empty($xmlElement->secret)) {
            $consumer->setSecret((string)$xmlElement->secret);
        }

        if (!empty($xmlElement->name)) {
            $consumer->setName((string)$xmlElement->name);
        }

        return $consumer;
    }
}
