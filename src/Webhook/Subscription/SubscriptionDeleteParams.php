<?php

declare(strict_types=1);

namespace Getivy\Webhook\Subscription;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Deletes a webhook subscription.
 */
final class SubscriptionDeleteParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The unique identifier of the webhook subscription to delete.
     */
    #[Api]
    public mixed $id;

    /**
     * `new SubscriptionDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionDeleteParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionDeleteParams)->withID(...)
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
     * The unique identifier of the webhook subscription to delete.
     */
    public function withID(mixed $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
