<?php

declare(strict_types=1);

namespace Getivy\Webhook\Subscription;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Lists all webhook subscriptions that are registered for the merchant. The results are paginated and provided in chronological order.
 */
final class SubscriptionListParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The maximum number of webhook subscriptions to return.
     */
    #[Api(optional: true)]
    public ?float $limit;

    /**
     * The number of webhook subscriptions to skip.
     */
    #[Api(optional: true)]
    public ?float $skip;

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
    public static function with(?float $limit = null, ?float $skip = null): self
    {
        $obj = new self;

        null !== $limit && $obj->limit = $limit;
        null !== $skip && $obj->skip = $skip;

        return $obj;
    }

    /**
     * The maximum number of webhook subscriptions to return.
     */
    public function withLimit(float $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * The number of webhook subscriptions to skip.
     */
    public function withSkip(float $skip): self
    {
        $obj = clone $this;
        $obj->skip = $skip;

        return $obj;
    }
}
