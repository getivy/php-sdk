<?php

declare(strict_types=1);

namespace Getivy\Responses\Webhook\Subscription;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

final class SubscriptionPingResponse implements BaseModel
{
    use SdkModel;

    /**
     * The unique identifier of the webhook subscription.
     */
    #[Api]
    public mixed $id;

    /**
     * The timestamp when the ping was executed.
     */
    #[Api]
    public mixed $date;

    /**
     * The response from the webhook endpoint.
     */
    #[Api]
    public mixed $response;

    /**
     * The HTTP status code returned by the webhook endpoint.
     */
    #[Api]
    public float $statusCode;

    /**
     * Whether the ping was successful.
     */
    #[Api]
    public bool $success;

    /**
     * `new SubscriptionPingResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionPingResponse::with(
     *   id: ..., date: ..., response: ..., statusCode: ..., success: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionPingResponse)
     *   ->withID(...)
     *   ->withDate(...)
     *   ->withResponse(...)
     *   ->withStatusCode(...)
     *   ->withSuccess(...)
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
        mixed $id,
        mixed $date,
        mixed $response,
        float $statusCode,
        bool $success
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->date = $date;
        $obj->response = $response;
        $obj->statusCode = $statusCode;
        $obj->success = $success;

        return $obj;
    }

    /**
     * The unique identifier of the webhook subscription.
     */
    public function withID(mixed $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The timestamp when the ping was executed.
     */
    public function withDate(mixed $date): self
    {
        $obj = clone $this;
        $obj->date = $date;

        return $obj;
    }

    /**
     * The response from the webhook endpoint.
     */
    public function withResponse(mixed $response): self
    {
        $obj = clone $this;
        $obj->response = $response;

        return $obj;
    }

    /**
     * The HTTP status code returned by the webhook endpoint.
     */
    public function withStatusCode(float $statusCode): self
    {
        $obj = clone $this;
        $obj->statusCode = $statusCode;

        return $obj;
    }

    /**
     * Whether the ping was successful.
     */
    public function withSuccess(bool $success): self
    {
        $obj = clone $this;
        $obj->success = $success;

        return $obj;
    }
}
