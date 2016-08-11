<?php

namespace LogFrontendBundle\Writer;

use LogFrontendBundle\DataTransformer\LogToJsonTransformer;
use LogFrontendBundle\Model\Log;
use LogFrontendBundle\Exception\WriterException;

class LogWriter
{
    private $path;
    private $logTransformer;

    public function __construct($path, LogToJsonTransformer $logTransformer)
    {
        $this->path = $path;
        $this->logTransformer = $logTransformer;
    }

    public function writeLog(Log $log)
    {
        $data = $this->logTransformer->transform($log);
        $data = $this->addNewLineSign($data);

        if (!$fp = fopen($this->path, 'a')) {
            throw new WriterException('Cannot open file');
        }
        if (fwrite($fp, $data) === FALSE) {
            throw new WriterException('Cannot write to file');
        }

        fclose($fp);

    }

    private function addNewLineSign($data)
    {
        return $data.'\n';
    }
}