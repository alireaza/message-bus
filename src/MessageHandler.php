<?php

namespace AliReaza\MessageBus;

class MessageHandler implements MessageHandlerInterface
{
    public function __construct(public MessageHandlerInterface $handler)
    {
    }

    public function getHandlersForMessage(MessageInterface $message): iterable
    {
        return $this->handler->getHandlersForMessage($message);
    }

    public function handle(?MessageInterface $message = null): void
    {
        $this->handler->handle($message);
    }

    public function addHandler(MessageInterface $message, HandlerInterface $handler): MessageHandlerInterface
    {
        return $this->handler->addHandler($message, $handler);
    }

    public function clearHandlers(MessageInterface $message): void
    {
        $this->handler->clearHandlers($message);
    }

    public function setTimeoutMs(int $timeout_ms): void
    {
        $this->handler->setTimeoutMs($timeout_ms);
    }
}
