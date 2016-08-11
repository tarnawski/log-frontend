<?php

namespace LogFrontendBundle\Auth;

class HostAuth
{
    /** @var  array */
    private $hostArray;

    public function __construct($hostArray)
    {
        $this->hostArray = $hostArray;
    }

    public function isGranted($host)
    {
        if (empty($this->hostArray)){
            return true;
        }

        return in_array($host, $this->hostArray);
    }
}