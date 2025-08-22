<?php

declare(strict_types=1);

namespace Getivy\Mandates\Mandate;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

final class Signature implements BaseModel
{
    use SdkModel;

    #[Api]
    public string $token;

    #[Api]
    public string $ip;

    #[Api]
    public mixed $signedAt;

    /**
     * `new Signature()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Signature::with(token: ..., ip: ..., signedAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Signature)->withToken(...)->withIP(...)->withSignedAt(...)
     * ```
     */
    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string $token,
        string $ip,
        mixed $signedAt
    ): self {
        $obj = new self;

        $obj->token = $token;
        $obj->ip = $ip;
        $obj->signedAt = $signedAt;

        return $obj;
    }

    public function withToken(string $token): self
    {
        $obj = clone $this;
        $obj->token = $token;

        return $obj;
    }

    public function withIP(string $ip): self
    {
        $obj = clone $this;
        $obj->ip = $ip;

        return $obj;
    }

    public function withSignedAt(mixed $signedAt): self
    {
        $obj = clone $this;
        $obj->signedAt = $signedAt;

        return $obj;
    }
}
