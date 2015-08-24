<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 24/08/15
 * Time: 12:09
 */

namespace CultuurNet\UitidCredentials\Entities;

class ConsumerTest extends \PHPUnit_Framework_TestCase
{

    protected $consumer;

    public function setUp()
    {
        $this->consumer = new Consumer();
    }

    public function testCreateConsumerFromXML()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
        <response>
          <consumer>
            <key>f4e3c8b7f1c0b57a2313bd92dbeff7c2</key>
            <name>testchannel</name>
            <searchPrefix></searchPrefix>
            <searchPrefixFilterQuery></searchPrefixFilterQuery>
            <secret>94238234899842389743298897247892</secret>
          </consumer>
        </response>';

        $sxe = new \SimpleXMLElement($xml);

        $xmlElement = $sxe->consumer;

        $correctConsumer = new Consumer(
            'f4e3c8b7f1c0b57a2313bd92dbeff7c2',
            '94238234899842389743298897247892',
            'testchannel'
        );

        $this->assertEquals(
            $correctConsumer,
            $this->consumer->parseFromXml($xmlElement)
        );
    }
}
