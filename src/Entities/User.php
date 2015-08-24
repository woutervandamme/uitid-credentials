<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 24/08/15
 * Time: 11:35
 */

namespace CultuurNet\UitidCredentials\Entities;

class User
{

    /**
     * @var string
     */
    protected $uid;

    /**
     * @var string
     */
    protected $nick;

    /**
     * @var string
     */
    protected $email;

    /**
     * @param null $uid
     * @param null $nick
     * @param null $email
     */
    public function __construct($uid = null, $nick = null, $email = null)
    {
        $this->uid = $uid;
        $this->nick = $nick;
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @return string
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $uid
     */
    protected function setUid($uid)
    {
        $this->uid = $uid;
    }

    /**
     * @param string $nick
     */
    protected function setNick($nick)
    {
        $this->nick = $nick;
    }

    /**
     * @param string $email
     */
    protected function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param \SimpleXMLElement $xmlElement
     * @return User
     */
    public function parseFromXml(\SimpleXMLElement $xmlElement)
    {
        $user = new self();

        if (!empty($xmlElement->uid)) {
            $user->setUid((string)$xmlElement->uid);
        }

        if (!empty($xmlElement->nick)) {
            $user->setNick((string)$xmlElement->nick);
        }

        if (!empty($xmlElement->email)) {
            $user->setEmail((string)$xmlElement->email);
        }

        return $user;
    }
}
