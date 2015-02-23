<?php

/*
 * This file is part of the Medio project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Gnugat\Medio\Model;

use Gnugat\Medio\Model\Constant;
use Gnugat\Medio\Model\Method;
use PhpSpec\ObjectBehavior;

class ContractSpec extends ObjectBehavior
{
    const NAME = 'MyInterface';

    function let()
    {
        $this->beConstructedWith(self::NAME);
    }

    function it_is_a_structure()
    {
        $this->shouldImplement('Gnugat\Medio\Model\Structure');
    }

    function it_has_a_name()
    {
        $this->getName()->shouldBe(self::NAME);
    }

    function it_can_have_constants(Constant $constant)
    {
        $constants = $this->allConstants();

        $constants->all()->shouldBe(array());
        $this->addConstant($constant);
        $constants->all()->shouldBe(array($constant));
    }

    function it_can_have_methods(Method $method)
    {
        $methods = $this->allMethods();

        $methods->all()->shouldBe(array());
        $this->addMethod($method);
        $methods->all()->shouldBe(array($method));
    }
}
