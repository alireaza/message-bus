<?php

namespace AliReaza\MessageBus;

interface HandlerInterface
{
    public function __invoke(MessageInterface $message): void;
}
