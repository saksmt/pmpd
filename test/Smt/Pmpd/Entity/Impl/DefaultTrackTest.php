<?php

namespace Smt\Pmpd\Entity\Impl;

use Smt\OpenPopo\Reflection\PopoClass;
use Smt\OpenPopo\Rule\Impl\GetterMustExist;
use Smt\OpenPopo\Rule\Impl\SetterMustExist;
use Smt\OpenPopo\Tester\Impl\FluentSetterTester;
use Smt\OpenPopo\Tester\Impl\GetterTester;
use Smt\OpenPopo\Validator\Validator;
use Smt\Pmpd\Entity\Impl\DefaultTrack;

/**
 * Test for @a Track
 * @package Smt\Pmpd\Entity\Impl
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class DefaultTrackTest extends \PHPUnit_Framework_TestCase
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

            ->validate(PopoClass::fromClassName(DefaultTrack::class))
        ;
    }
}
