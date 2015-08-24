<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 24/08/15
 * Time: 11:02
 */

namespace CultuurNet\UitidCredentials;

use \CultuurNet\Auth\Guzzle\OAuthProtectedService;
use CultuurNet\UitidCredentials\Entities\Consumer;
use CultuurNet\UitidCredentials\Entities\Token;

class UitidCredentialsFetcher extends OAuthProtectedService implements UitidCredentialsService
{
    /**
     * @param $consumerKey
     * @return Consumer
     */
    public function getConsumer($consumerKey)
    {
        $client = $this->getClient();
        $request = $client->get('/authapi/consumer/' . $consumerKey);

        $response = $request->send();
        $xmlElement = new \SimpleXMLElement($response->getBody(true));

        $consumer = new Consumer();
        if (!empty($xmlElement->consumer)) {
            $consumer = $consumer->parseFromXml($xmlElement->consumer);
        }
        return $consumer;
    }

    public function getAccessToken($tokenKey)
    {
        $client = $this->getClient();
        $request = $client->get('/authapi/accesstoken/' . $tokenKey);

        $response = $request->send();
        $xmlElement = new \SimpleXMLElement($response->getBody(true));

        $token = new Token();
        if (!empty($xmlElement->token)) {
            $token = $token->parseFromXml($xmlElement->token);
        }
        return $token;
    }
}
