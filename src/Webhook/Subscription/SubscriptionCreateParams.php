<?php

declare(strict_types=1);

namespace Getivy\Webhook\Subscription;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Webhook\Subscription\SubscriptionCreateParams\Event;

/**
 * Creates a webhook subscription that sends various events from Ivy to a specified url. There can be multiple subscriptions per app.
 */
final class SubscriptionCreateParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The endpoint where webhook events are sent.
     */
    #[Api]
    public string $url;

    /**
     * The events to subscribe the url to.
     *
     * @var list<Event::*>|null $events
     */
    #[Api(list: Event::class, optional: true)]
    public ?array $events;

    /**
     * `new SubscriptionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionCreateParams::with(url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionCreateParams)->withURL(...)
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
    public static function with(string $url, ?array $events = null): self
    {
        $obj = new self;

        $obj->url = $url;

        null !== $events && $obj->events = $events;

        return $obj;
    }

    /**
     * The endpoint where webhook events are sent.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    /**
     * The events to subscribe the url to.
     *
     * @param list<Event::*> $events
     */
    public function withEvents(array $events): self
    {
        $obj = clone $this;
        $obj->events = $events;

        return $obj;
    }
}
