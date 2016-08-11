<?php

namespace spec\LogFrontendBundle\Auth;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HostAuthSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(['host1.dev', 'host2.dev']);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LogFrontendBundle\Auth\HostAuth');
    }

    function it_should_allow_access_with_empty_acl()
    {
        $this->beConstructedWith([]);
        $this->isGranted('host3.dev')->shouldReturn(true);
    }

    function it_should_allow_access()
    {
        $this->isGranted('host1.dev')->shouldReturn(true);
    }

    function it_should_not_allow_access()
    {
        $this->isGranted('host3.dev')->shouldReturn(false);
    }
}
