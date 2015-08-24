<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 24/08/15
 * Time: 14:17
 */

namespace CultuurNet\UitidCredentials\Entities;

class TokenTest extends \PHPUnit_Framework_TestCase
{
    protected $token;

    public function setUp()
    {
        $this->token = new Token();
    }

    public function testCreateConsumerFromXML()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
    <response>
      <token>
        <consumer>
          <key>d454b97f34c14dac0430ea1bd3f16d45</key>
          <name>UiTDatabank</name>
          <searchPrefix></searchPrefix>
          <searchPrefixFilterQuery></searchPrefixFilterQuery>
          <secret>0943093409903409023092439023</secret>
        </consumer>
        <token>0005548e3bfe0a47938fd5b1c8369ff1</token>
        <tokenSecret>0943093409903409023092439023</tokenSecret>
        <user>
          <email>example@cultuurnet.be</email>
          <nick>Test user</nick>
          <uid>11a9e9b8-c71c-4850-ab93-f14a10ca9e47</uid>
        </user>
      </token>
    </response>';

        $sxe = new \SimpleXMLElement($xml);

        $xmlElement = $sxe->token;

        $correctToken = new Token(
            '0005548e3bfe0a47938fd5b1c8369ff1',
            '0943093409903409023092439023',
            new User(
                '11a9e9b8-c71c-4850-ab93-f14a10ca9e47',
                'Test user',
                'example@cultuurnet.be'
            ),
            new Consumer(
                'd454b97f34c14dac0430ea1bd3f16d45',
                '0943093409903409023092439023',
                'UiTDatabank'
            )
        );

        $this->assertEquals(
            $correctToken,
            $this->token->parseFromXml($xmlElement)
        );
    }
}
