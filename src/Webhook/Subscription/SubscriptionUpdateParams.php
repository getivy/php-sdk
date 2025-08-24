<?php

declare(strict_types=1);

namespace Getivy\Webhook\Subscription;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Webhook\Subscription\SubscriptionUpdateParams\Event;

/**
 * Updates the url or subcribed to events for a webhook subscription. This can be used via the app or via the API by providing an API key.
 */
final class SubscriptionUpdateParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The unique identifier of the webhook subscription to update.
     */
    #[Api]
    public mixed $id;

    /**
     * The new events to subscribe the url to.
     *
     * @var list<Event::*>|null $events
     */
    #[Api(list: Event::class, optional: true)]
    public ?array $events;

    /**
     * The new endpoint where webhook events are sent.
     */
    #[Api(optional: true)]
    public ?string $url;

    /**
     * `new SubscriptionUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionUpdateParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionUpdateParams)->withID(...)
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
     *
     * @param list<Event::*> $events
     */
    public static function with(
        mixed $id,
        ?array $events = null,
        ?string $url = null
    ): self {
        $obj = new self;

        $obj->id = $id;

        null !== $events && $obj->events = $events;
        null !== $url && $obj->url = $url;

        return $obj;
    }

    /**
     * The unique identifier of the webhook subscription to update.
     */
    public function withID(mixed $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The new events to subscribe the url to.
     *
     * @param list<Event::*> $events
     */
    public function withEvents(array $events): self
    {
        $obj = clone $this;
        $obj->events = $events;

        return $obj;
    }

    /**
     * The new endpoint where webhook events are sent.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }
}
