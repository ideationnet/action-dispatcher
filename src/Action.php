<?php

namespace IdNet;


class Action
{
    public static function create($domain) {
        $action = new self;
        $action->setDomainHandler($domain);
        return $action;
    }

    protected $inputHandler = 'input.default';
    protected $domainHandler;
    protected $responseHandler = 'responder.default';

    public function domain($domain) {
        $this->setDomainHandler($domain);
    }

    public function getInputHandler()
    {
        return $this->inputHandler;
    }

    public function setInputHandler($inputHandler)
    {
        $this->inputHandler = $inputHandler;
    }

    public function getDomainHandler()
    {
        return $this->domainHandler;
    }

    public function setDomainHandler($domainHandler)
    {
        $this->domainHandler = $domainHandler;
    }

    public function getResponseHandler()
    {
        return $this->responseHandler;
    }

    public function setResponseHandler($responseHandler)
    {
        $this->responseHandler = $responseHandler;
    }

}
