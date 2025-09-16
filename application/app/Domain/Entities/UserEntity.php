<?php

namespace App\Domain\Entities;

use App\Domain\ValueObjects\Email;

class UserEntity implements \JsonSerializable
{
    public function __construct(
        public readonly string $name,
        public readonly Email $email,
        public readonly string $password,
        public readonly ?string $id = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
    ) {
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

    public function toArray(): array
    {
        return $this->jsonSerialize();
    }
}
