<?php

namespace Smt\Pmpd\Entity;

use Smt\OpenPopo\Reflection\PopoClass;
use Smt\OpenPopo\Rule\Impl\GetterMustExist;
use Smt\OpenPopo\Rule\Impl\SetterMustExist;
use Smt\OpenPopo\Tester\Impl\FluentSetterTester;
use Smt\OpenPopo\Tester\Impl\GetterTester;
use Smt\OpenPopo\Validator\Validator;

/**
 * Test for @a Status
 * @package Smt\Pmpd\Entity
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class StatusTest extends \PHPUnit_Framework_TestCase
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
            ->addTester(FluentSetterTester::create()
                ->skip('repeat')
                ->skip('random')
                ->skip('single')
                ->skip('consume'))

            ->validate(PopoClass::fromClassName(Status::class));
    }

    /**
     * @test
     */
    public function testRepeat()
    {
        $testable = new Status();
        $this->assertNull($testable->isRepeat());
        $this->assertEquals($testable, $testable->setRepeat(true));
        $this->assertTrue($testable->isRepeat());
    }

    /**
     * @test
     */
    public function testRandom()
    {
        $testable = new Status();
        $this->assertNull($testable->isRandom());
        $this->assertEquals($testable, $testable->setRandom(true));
        $this->assertTrue($testable->isRandom());
    }

    /**
     * @test
     */
    public function testSingle()
    {
        $testable = new Status();
        $this->assertNull($testable->isSingle());
        $this->assertEquals($testable, $testable->setSingle(true));
        $this->assertTrue($testable->isSingle());
    }

    /**
     * @test
     */
    public function testConsume()
    {
        $testable = new Status();
        $this->assertNull($testable->isConsume());
        $this->assertEquals($testable, $testable->setConsume(true));
        $this->assertTrue($testable->isConsume());
    }
}
