<?php

namespace spec\LogFrontendBundle\Writer;

use LogFrontendBundle\DataTransformer\LogToJsonTransformer;
use LogFrontendBundle\Model\Log;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LogWriterSpec extends ObjectBehavior
{
    function let(LogToJsonTransformer $logToJsonTransformer)
    {
        $this->beConstructedWith('path/to/front.log', $logToJsonTransformer);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LogFrontendBundle\Writer\LogWriter');
    }
}
