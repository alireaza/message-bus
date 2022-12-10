<?php

namespace AliReaza\MessageBus;

use AliReaza\UUID\V4 as UUID_V4;
use DateTime;

class Message implements MessageInterface
{
    public function __construct(private ?string $content = null,
                                private ?string $causation_id = null,
                                private ?string $correlation_id = null,
                                private ?string $name = null,
                                private ?int    $timestamp = null,
                                private ?string $message_id = null)
    {
        if (is_null($message_id)) {
            $this->message_id = (string)new UUID_V4();
        }

        if (is_null($causation_id)) {
            $this->setCausationId($this->message_id);
        }

        if (is_null($correlation_id)) {
            $this->setCorrelationId($this->getCausationId());
        }

        if (is_null($name)) {
            $this->setName(get_class($this));
        }

        if (is_null($timestamp)) {
            $date_time = new DateTime();

            $this->setTimestamp($date_time->format('Uv'));
        }
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function getMessageId(): string
    {
        return $this->message_id;
    }

    public function setCausationId(string $causation_id): void
    {
        $this->causation_id = $causation_id;
    }

    public function getCausationId(): string
    {
        return $this->causation_id;
    }

    public function setCorrelationId(string $correlation_id): void
    {
        $this->correlation_id = $correlation_id;
    }

    public function getCorrelationId(): string
    {
        return $this->correlation_id;
    }

    public function setTimestamp(int $timestamp): void
    {
        $this->timestamp = $timestamp;
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    public function __toString(): string
    {
        return json_encode([
            'content' => $this->getContent(),
            'causation_id' => $this->getCausationId(),
            'correlation_id' => $this->getCorrelationId(),
            'name' => $this->getName(),
            'timestamp' => $this->getTimestamp(),
            'message_id' => $this->getMessageId(),
        ]);
    }
}
