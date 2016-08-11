<?php

namespace LogFrontendBundle\DataTransformer;

use LogFrontendBundle\Model\Log;

class LogToJsonTransformer
{
    public function transform(Log $log)
    {
        $data = [
            'level' => $log->level ? $log->level : null,
            'message' => $log->message ? $log->message : null,
            'context' => $log->context ? $log->context : null
        ];

        return json_encode($data);
    }
}