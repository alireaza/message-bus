<?php

namespace AliReaza\MessageBus;

class MessageDispatcher implements MessageDispatcherInterface
{
    public function __construct(private MessageDispatcherInterface $dispatcher)
    {
    }

    public function dispatch(MessageInterface $message): MessageInterface
    {
        return $this->dispatcher->dispatch($message);
    }
}
