<?php

declare(strict_types=1);

namespace Getivy\Contracts\Webhook;

use Getivy\RequestOptions;
use Getivy\Responses\Webhook\Subscription\SubscriptionDeleteResponse;
use Getivy\Responses\Webhook\Subscription\SubscriptionListResponse;
use Getivy\Responses\Webhook\Subscription\SubscriptionNewResponse;
use Getivy\Responses\Webhook\Subscription\SubscriptionPingResponse;
use Getivy\Responses\Webhook\Subscription\SubscriptionUpdateResponse;
use Getivy\Webhook\Subscription\SubscriptionCreateParams\Event;
use Getivy\Webhook\Subscription\SubscriptionUpdateParams\Event as Event1;

interface SubscriptionContract
{
    /**
     * @param string $url the endpoint where webhook events are sent
     * @param list<Event::*> $events the events to subscribe the url to
     */
    public function create(
        $url,
        $events = null,
        ?RequestOptions $requestOptions = null
    ): SubscriptionNewResponse;

    /**
     * @param mixed $id The unique identifier of the webhook subscription to update
     * @param list<Event1::*> $events The new events to subscribe the url to
     * @param string $url The new endpoint where webhook events are sent
     */
    public function update(
        $id,
        $events = null,
        $url = null,
        ?RequestOptions $requestOptions = null
    ): SubscriptionUpdateResponse;

    /**
     * @param float $limit The maximum number of webhook subscriptions to return
     * @param float $skip The number of webhook subscriptions to skip
     */
    public function list(
        $limit = null,
        $skip = null,
        ?RequestOptions $requestOptions = null
    ): SubscriptionListResponse;

    /**
     * @param mixed $id The unique identifier of the webhook subscription to delete
     */
    public function delete(
        $id,
        ?RequestOptions $requestOptions = null
    ): SubscriptionDeleteResponse;

    /**
     * @param mixed $id The unique identifier of the webhook subscription to ping
     */
    public function ping(
        $id,
        ?RequestOptions $requestOptions = null
    ): SubscriptionPingResponse;
}
