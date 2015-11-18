<?php

namespace Smt\Pmpd\Configuration;

use Smt\OpenPopo\Reflection\PopoClass;
use Smt\OpenPopo\Rule\Impl\GetterMustExist;
use Smt\OpenPopo\Rule\Impl\SetterMustExist;
use Smt\OpenPopo\Tester\Impl\FluentSetterTester;
use Smt\OpenPopo\Tester\Impl\GetterTester;
use Smt\OpenPopo\Validator\Validator;

/**
 * Test for host configuration entity
 * @package Smt\Pmpd\Configuration
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class HostConfigurationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function test()
    {
        Validator::create()
            ->addRule(GetterMustExist::create())
            ->addRule(SetterMustExist::create())

            ->addTester(GetterTester::create())
            ->addTester(FluentSetterTester::create())

            ->validate(PopoClass::fromClassName(HostConfiguration::class))
        ;
    }

    /**
     * @test
     */
    public function testToString()
    {
        $this->assertEquals('localhost:6600', new HostConfiguration());
    }
}
