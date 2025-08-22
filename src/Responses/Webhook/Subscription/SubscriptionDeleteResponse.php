<?php

declare(strict_types=1);

namespace Getivy\Responses\Webhook\Subscription;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

final class SubscriptionDeleteResponse implements BaseModel
{
    use SdkModel;

    /**
     * Whether the webhook subscription was successfully deleted.
     */
    #[Api]
    public bool $success;

    /**
     * `new SubscriptionDeleteResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionDeleteResponse::with(success: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionDeleteResponse)->withSuccess(...)
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
    public static function with(bool $success): self
    {
        $obj = new self;

        $obj->success = $success;

        return $obj;
    }

    /**
     * Whether the webhook subscription was successfully deleted.
     */
    public function withSuccess(bool $success): self
    {
        $obj = clone $this;
        $obj->success = $success;

        return $obj;
    }
}
