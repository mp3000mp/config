<?php
namespace Noodlehaus\Parser\Test;

use PHPUnit\Framework\TestCase;
use Noodlehaus\Parser\Yaml;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-04-21 at 22:37:22.
 */
class YamlTest extends TestCase
{
    /**
     * @var Yaml
     */
    protected $yaml;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->yaml = new Yaml();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Noodlehaus\Parser\Yaml::getSupportedExtensions()
     */
    public function testGetSupportedExtensions()
    {
        $expected = ['yaml', 'yml'];
        $actual   = $this->yaml->getSupportedExtensions();
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers                   Noodlehaus\Parser\Yaml::parse()
     * @expectedException        Noodlehaus\Exception\ParseException
     * @expectedExceptionMessage Error parsing YAML string
     */
    public function testLoadInvalidYaml()
    {
        $this->yaml->parse(file_get_contents(__DIR__ . '/../mocks/fail/error.yaml'));
    }

    /**
     * @covers Noodlehaus\Parser\Yaml::parse()
     */
    public function testLoadYaml()
    {
        $actual = $this->yaml->parse(file_get_contents(__DIR__ . '/../mocks/pass/config.yaml'));
        $this->assertEquals('localhost', $actual['host']);
        $this->assertEquals('80', $actual['port']);
    }

    /**
     * @covers Noodlehaus\Parser\Yaml::parse()
     */
    public function testLoadYml()
    {
        $actual = $this->yaml->parse(file_get_contents(__DIR__ . '/../mocks/pass/config.yml'));
        $this->assertEquals('localhost', $actual['host']);
        $this->assertEquals('80', $actual['port']);
    }
}
