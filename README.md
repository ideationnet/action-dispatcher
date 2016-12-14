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
'action.example' => object(Action::class)
    ->method('domain', YourDomainClass::class),
    
'input.default' => get(YourDefaultInput::class),
'responder.default' => get(YourDefaultResonder::class),]

'another.action' => object(Action::class)
    ->method('input', OverrideInputClass::class)
    ->method('domain', AnotherDomain::class)
    ->method('responder', CustomResponder::class),
```

