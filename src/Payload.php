<?php

namespace IdNet;


class Payload
{

    public static function create($output, $code = 200)
    {
        return (new self)
            ->setOutput($output)
            ->setStatusCode($code);
    }

    public static function redirect($url, $code = 301)
    {
        return (new self)
            ->setRedirectUrl($url)
            ->setStatusCode($code);
    }

    protected $output;
    protected $redirectUrl = null;
    protected $statusCode;

    public function setOutput($output)
    {
        $this->output = $output;
        return $this;
    }

    public function setStatusCode($code)
    {
        $this->statusCode = $code;
        return $this;
    }

    public function setRedirectUrl($redirect)
    {
        $this->redirectUrl = $redirect;
        return $this;
    }

    public function getOutput()
    {
        return $this->output;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getRedirectUrl()
    {
        if (!isset($this->redirectUrl)) {
            return false;
        }
        return $this->redirectUrl;
    }
}
