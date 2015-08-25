<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 24/08/15
 * Time: 10:40
 */
namespace CultuurNet\UitidCredentials;

use CultuurNet\UitidCredentials\Entities\Consumer;
use CultuurNet\UitidCredentials\Entities\Token;

interface UitidCredentialsService
{
    /**
     * @param string $consumerKey
     * @return Consumer
     */
    public function getConsumer($consumerKey);

    /**
     * @param string $tokenKey
     * @return Token
     */
    public function getAccessToken($tokenKey);
}
