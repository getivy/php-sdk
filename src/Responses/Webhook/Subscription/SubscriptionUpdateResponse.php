<?php

declare(strict_types=1);

namespace Getivy\Responses\Webhook\Subscription;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Webhook\Subscription\SubscriptionUpdateResponse\Event;

final class SubscriptionUpdateResponse implements BaseModel
{
    use SdkModel;

    #[Api]
    public mixed $id;

    #[Api]
    public mixed $createdAt;

    /** @var list<Event::*> $events */
    #[Api(list: Event::class)]
    public array $events;

    #[Api]
    public mixed $merchant;

    #[Api]
    public mixed $merchantApp;

    #[Api]
    public mixed $updatedAt;

    #[Api]
    public string $url;

    /**
     * `new SubscriptionUpdateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionUpdateResponse::with(
     *   id: ...,
     *   createdAt: ...,
     *   events: ...,
     *   merchant: ...,
     *   merchantApp: ...,
     *   updatedAt: ...,
     *   url: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionUpdateResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withEvents(...)
     *   ->withMerchant(...)
     *   ->withMerchantApp(...)
     *   ->withUpdatedAt(...)
     *   ->withURL(...)
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
        mixed $createdAt,
        array $events,
        mixed $merchant,
        mixed $merchantApp,
        mixed $updatedAt,
        string $url,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->events = $events;
        $obj->merchant = $merchant;
        $obj->merchantApp = $merchantApp;
        $obj->updatedAt = $updatedAt;
        $obj->url = $url;

        return $obj;
    }

    public function withID(mixed $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreatedAt(mixed $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * @param list<Event::*> $events
     */
    public function withEvents(array $events): self
    {
        $obj = clone $this;
        $obj->events = $events;

        return $obj;
    }

    public function withMerchant(mixed $merchant): self
    {
        $obj = clone $this;
        $obj->merchant = $merchant;

        return $obj;
    }

    public function withMerchantApp(mixed $merchantApp): self
    {
        $obj = clone $this;
        $obj->merchantApp = $merchantApp;

        return $obj;
    }

    public function withUpdatedAt(mixed $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }
}
