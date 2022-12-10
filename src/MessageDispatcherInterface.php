<?php

namespace AliReaza\MessageBus;

interface MessageDispatcherInterface
{
    public function dispatch(MessageInterface $message): MessageInterface;
}
