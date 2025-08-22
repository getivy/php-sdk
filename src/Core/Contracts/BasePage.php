<?php

declare(strict_types=1);

namespace Getivy\Core\Contracts;

use Getivy\Core\BaseClient;
use Getivy\Core\Pagination\PageRequestOptions;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
interface BasePage
{
    public function __construct(
        BaseClient $client,
        PageRequestOptions $options,
        ResponseInterface $response,
        mixed $body,
    );
}
