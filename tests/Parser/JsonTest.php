<?php
namespace Noodlehaus\Parser\Test;

use PHPUnit\Framework\TestCase;
use Noodlehaus\Parser\Json;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-04-21 at 22:37:22.
 */
class JsonTest extends TestCase
{
    /**
     * @var Json
     */
    protected $json;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->json = new Json();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Noodlehaus\Parser\Json::getSupportedExtensions()
     */
    public function testGetSupportedExtensions()
    {
        $expected = ['json'];
        $actual   = $this->json->getSupportedExtensions();
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers                   Noodlehaus\Parser\Json::parse()
     * @expectedException        Noodlehaus\Exception\ParseException
     * @expectedExceptionMessage Syntax error
     */
    public function testLoadInvalidJson()
    {
        $this->json->parse(file_get_contents(__DIR__ . '/../mocks/fail/error.json'));
    }

    /**
     * @covers Noodlehaus\Parser\Json::parse()
     */
    public function testLoadJson()
    {
        $actual = $this->json->parse(file_get_contents(__DIR__ . '/../mocks/pass/config.json'));
        $this->assertEquals('localhost', $actual['host']);
        $this->assertEquals('80', $actual['port']);
    }
}
