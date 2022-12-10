<?php

namespace AliReaza\MessageBus;

interface MessageHandlerInterface
{
    public function getHandlersForMessage(MessageInterface $message): iterable;

    public function addHandler(MessageInterface $message, HandlerInterface $handler): MessageHandlerInterface;

    public function handle(?MessageInterface $message = null): void;

    public function clearHandlers(MessageInterface $message): void;

    public function setTimeoutMs(int $timeout_ms): void;
}
