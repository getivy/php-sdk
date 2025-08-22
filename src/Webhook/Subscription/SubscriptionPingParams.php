<?php

declare(strict_types=1);

namespace Getivy\Webhook\Subscription;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Sends a test ping to verify webhook subscription endpoint connectivity.
 */
final class SubscriptionPingParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The unique identifier of the webhook subscription to ping.
     */
    #[Api]
    public mixed $id;

    /**
     * `new SubscriptionPingParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionPingParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionPingParams)->withID(...)
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
    public static function with(mixed $id): self
    {
        $obj = new self;

        $obj->id = $id;

        return $obj;
    }

    /**
     * The unique identifier of the webhook subscription to ping.
     */
    public function withID(mixed $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
