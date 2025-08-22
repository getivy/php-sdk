<?php

declare(strict_types=1);

namespace Getivy\Services;

use Getivy\Client;
use Getivy\Contracts\WebhookContract;
use Getivy\Core\Conversion;
use Getivy\RequestOptions;
use Getivy\Responses\Webhook\WebhookTriggerResponse;
use Getivy\Services\Webhook\SubscriptionService;
use Getivy\Webhook\WebhookTriggerParams;

final class WebhookService implements WebhookContract
{
    public SubscriptionService $subscription;

    public function __construct(private Client $client)
    {
        $this->subscription = new SubscriptionService($this->client);
    }

    /**
     * This endpoint allows you to trigger a specific webhook by its ID.
     *
     * @param mixed $id the unique identifier for the webhook to trigger
     */
    public function trigger(
        $id,
        ?RequestOptions $requestOptions = null
    ): WebhookTriggerResponse {
        $args = ['id' => $id];
        [$parsed, $options] = WebhookTriggerParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/webhook/trigger',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(WebhookTriggerResponse::class, value: $resp);
    }
}
