<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 24/08/15
 * Time: 10:40
 */
namespace CultuurNet\UitidCredentials;

use \CultuurNet\Auth\Guzzle\OAuthProtectedService;

interface UitidCredentialsService
{
    public function getConsumer($consumerKey);
    public function getAccessToken($tokenKey);
}
