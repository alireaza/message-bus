<?php

namespace AliReaza\MessageBus;

interface MessageInterface
{
    public function getName(): string;

    public function getContent(): ?string;

    public function getMessageId(): string;

    public function getCausationId(): string;

    public function getCorrelationId(): string;

    public function getTimestamp(): int;
}
