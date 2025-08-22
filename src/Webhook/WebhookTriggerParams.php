<?php

declare(strict_types=1);

namespace Getivy\Webhook;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * This endpoint allows you to trigger a specific webhook by its ID.
 */
final class WebhookTriggerParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The unique identifier for the webhook to trigger.
     */
    #[Api]
    public mixed $id;

    /**
     * `new WebhookTriggerParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookTriggerParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookTriggerParams)->withID(...)
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
     * The unique identifier for the webhook to trigger.
     */
    public function withID(mixed $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
