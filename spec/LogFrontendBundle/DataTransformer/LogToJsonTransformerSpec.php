<?php

namespace spec\LogFrontendBundle\DataTransformer;

use LogFrontendBundle\Model\Log;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LogToJsonTransformerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('LogFrontendBundle\DataTransformer\LogToJsonTransformer');
    }

    function it_should_transform(Log $log)
    {
        $log->level = 'ERROR';
        $log->message = 'Wrong path';
        $log->context = 'File not found when try save data';
        $data = [
            'level' => 'ERROR',
            'message' => 'Wrong path',
            'context' => 'File not found when try save data'
        ];

        $result = $this->transform($log);

        $result->shouldBe(json_encode($data));
    }
}
