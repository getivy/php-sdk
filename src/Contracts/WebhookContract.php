<?php

declare(strict_types=1);

namespace Getivy\Contracts;

use Getivy\RequestOptions;
use Getivy\Responses\Webhook\WebhookTriggerResponse;

interface WebhookContract
{
    /**
     * @param mixed $id the unique identifier for the webhook to trigger
     */
    public function trigger(
        $id,
        ?RequestOptions $requestOptions = null
    ): WebhookTriggerResponse;
}
