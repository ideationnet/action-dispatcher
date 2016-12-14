<?php

namespace IdNet;


class Action
{
    public static function create(
        $input,
        $domain,
        $responder
    ) {
        $action = new self;
        $action->setInputHandler($input);
        $action->setDomainHandler($domain);
        $action->setResponseHandler($responder);
        return $action;
    }

    protected $inputHandler;
    protected $domainHandler;
    protected $responseHandler;


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
