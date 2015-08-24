<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 24/08/15
 * Time: 13:02
 */

namespace CultuurNet\UitidCredentials\Entities;

class UserTest extends \PHPUnit_Framework_TestCase
{
    protected $user;

    public function setUp()
    {
        $this->user = new User();
    }

    public function testCreateConsumerFromXML()
    {
        $xml = file_get_contents(dirname(__FILE__) . '/../samples/token.xml');

        $sxe = new \SimpleXMLElement($xml);

        $xmlElement = $sxe->token->user;

        $correctConsumer = new User(
            '11a9e9b8-c71c-4850-ab93-f14a10ca9e47',
            'Test user',
            'example@cultuurnet.be'
        );

        $this->assertEquals(
            $correctConsumer,
            $this->user->parseFromXml($xmlElement)
        );
    }
}
