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
     * @inheritdoc
     */
    public function getConsumer($consumerKey)
    {
        $client = $this->getClient();
        $request = $client->get('/uitid/rest/authapi/consumer/' . $consumerKey);

        $response = $request->send();
        $xmlElement = new \SimpleXMLElement($response->getBody(true));

        $consumer = new Consumer();
        if (!empty($xmlElement->consumer)) {
            return Consumer::parseFromXml($xmlElement->consumer);
        }
    }

    /**
     * @inheritdoc
     */
    public function getAccessToken($tokenKey)
    {
        $client = $this->getClient();
        $request = $client->get('/uitid/rest/authapi/accesstoken/' . $tokenKey);

        $response = $request->send();
        $xmlElement = new \SimpleXMLElement($response->getBody(true));

        if (!empty($xmlElement->token)) {
            return Token::parseFromXml($xmlElement->token);
        }
    }
}
