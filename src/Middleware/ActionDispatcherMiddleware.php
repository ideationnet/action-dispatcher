<?php

namespace IdNet\Middleware;


use IdNet\Payload;
use Interop\Http\Middleware\DelegateInterface;
use Interop\Http\Middleware\ServerMiddlewareInterface;
use Invoker\InvokerInterface;
use Psr\Http\Message\ServerRequestInterface;

class ActionDispatcherMiddleware implements ServerMiddlewareInterface
{
    /** @var InvokerInterface */
    protected $invoker;

    public function __construct(InvokerInterface $invoker)
    {
        $this->invoker = $invoker;
    }


    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $action = $request->getAttribute(ActionResolverMiddleware::ACTION_ATTRIBUTE);

        $inputHandler = $this->invoker->call([$action, 'getInputHandler']);

        $input = $this->invoker->call($inputHandler, [
            'request' => $request,
        ]);

        $domainHandler = $this->invoker->call([$action, 'getDomainHandler']);

        /** @var Payload $payload */
        $payload = $this->invoker->call($domainHandler, [
            'input' => $input,
        ]);

        $responseHandler = $this->invoker->call([$action, 'getResponseHandler']);

        return $this->invoker->call($responseHandler, [
            'request' => $request,
            'payload' => $payload,
        ]);
    }
}