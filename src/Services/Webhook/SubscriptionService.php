<?php

declare(strict_types=1);

namespace Getivy\Services\Webhook;

use Getivy\Client;
use Getivy\Contracts\Webhook\SubscriptionContract;
use Getivy\Core\Conversion;
use Getivy\Core\Util;
use Getivy\RequestOptions;
use Getivy\Responses\Webhook\Subscription\SubscriptionDeleteResponse;
use Getivy\Responses\Webhook\Subscription\SubscriptionListResponse;
use Getivy\Responses\Webhook\Subscription\SubscriptionNewResponse;
use Getivy\Responses\Webhook\Subscription\SubscriptionPingResponse;
use Getivy\Responses\Webhook\Subscription\SubscriptionUpdateResponse;
use Getivy\Webhook\Subscription\SubscriptionCreateParams;
use Getivy\Webhook\Subscription\SubscriptionCreateParams\Event;
use Getivy\Webhook\Subscription\SubscriptionDeleteParams;
use Getivy\Webhook\Subscription\SubscriptionListParams;
use Getivy\Webhook\Subscription\SubscriptionPingParams;
use Getivy\Webhook\Subscription\SubscriptionUpdateParams;
use Getivy\Webhook\Subscription\SubscriptionUpdateParams\Event as Event1;

final class SubscriptionService implements SubscriptionContract
{
    public function __construct(private Client $client) {}

    /**
     * Creates a webhook subscription that sends various events from Ivy to a specified url. There can be multiple subscriptions per app.
     *
     * @param string $url the endpoint where webhook events are sent
     * @param list<Event::*> $events the events to subscribe the url to
     */
    public function create(
        $url,
        $events = null,
        ?RequestOptions $requestOptions = null
    ): SubscriptionNewResponse {
        $args = ['url' => $url, 'events' => $events];
        $args = Util::array_filter_null($args, ['events']);
        [$parsed, $options] = SubscriptionCreateParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/webhook-subscription/create',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(SubscriptionNewResponse::class, value: $resp);
    }

    /**
     * Updates the url or subcribed to events for a webhook subscription. This can be used via the app or via the API by providing an API key.
     *
     * @param mixed $id The unique identifier of the webhook subscription to update
     * @param list<Event1::*> $events The new events to subscribe the url to
     * @param string $url The new endpoint where webhook events are sent
     */
    public function update(
        $id,
        $events = null,
        $url = null,
        ?RequestOptions $requestOptions = null
    ): SubscriptionUpdateResponse {
        $args = ['id' => $id, 'events' => $events, 'url' => $url];
        $args = Util::array_filter_null($args, ['events', 'url']);
        [$parsed, $options] = SubscriptionUpdateParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/webhook-subscription/update',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(SubscriptionUpdateResponse::class, value: $resp);
    }

    /**
     * Lists all webhook subscriptions that are registered for the merchant. The results are paginated and provided in chronological order.
     *
     * @param float $limit The maximum number of webhook subscriptions to return
     * @param float $skip The number of webhook subscriptions to skip
     */
    public function list(
        $limit = null,
        $skip = null,
        ?RequestOptions $requestOptions = null
    ): SubscriptionListResponse {
        $args = ['limit' => $limit, 'skip' => $skip];
        $args = Util::array_filter_null($args, ['limit', 'skip']);
        [$parsed, $options] = SubscriptionListParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/webhook-subscription/list',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(SubscriptionListResponse::class, value: $resp);
    }

    /**
     * Deletes a webhook subscription.
     *
     * @param mixed $id The unique identifier of the webhook subscription to delete
     */
    public function delete(
        $id,
        ?RequestOptions $requestOptions = null
    ): SubscriptionDeleteResponse {
        $args = ['id' => $id];
        [$parsed, $options] = SubscriptionDeleteParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/webhook-subscription/delete',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(SubscriptionDeleteResponse::class, value: $resp);
    }

    /**
     * Sends a test ping to verify webhook subscription endpoint connectivity.
     *
     * @param mixed $id The unique identifier of the webhook subscription to ping
     */
    public function ping(
        $id,
        ?RequestOptions $requestOptions = null
    ): SubscriptionPingResponse {
        $args = ['id' => $id];
        [$parsed, $options] = SubscriptionPingParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/webhook-subscription/ping',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(SubscriptionPingResponse::class, value: $resp);
    }
}
