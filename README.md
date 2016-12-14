# Action Dispatcher

A PSR-15 "Action Domain Responder" middleware that dispatches to actions
resolved by [Action Resolver](https://github.com/ideationnet/action-resolver).

Actions are dispatched using an [Invoker](https://github.com/PHP-DI/Invoker),
such as the one provided by [PHP-DI](https://github.com/PHP-DI/PHP-DI).

## Configuration

Actions should resolve to an instance of `IdNet\Action` where 
the input, domain, and responder have been set.
The dispatcher will use the provided implementation of 
`InvokerInterface` to invoke the callables.


```php
'action.example' => factory([Action::class, 'create'])
    ->parameter('input', get(ExampleInputHandler::class))
    ->parameter('domain', get(YourDomainLogic::class))
    ->parameter('responder', get(JsonResponseHandler::class)),
```

