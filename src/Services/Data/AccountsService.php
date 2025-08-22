<?php

declare(strict_types=1);

namespace Getivy\Services\Data;

use Getivy\Client;
use Getivy\Contracts\Data\AccountsContract;
use Getivy\Core\Conversion;
use Getivy\Data\Accounts\AccountListParams;
use Getivy\RequestOptions;
use Getivy\Responses\Data\Accounts\AccountListResponse;

final class AccountsService implements AccountsContract
{
    public function __construct(private Client $client) {}

    /**
     * Retrieves the list of accounts for a given data session.
     *
     * @param string $sessionID the ID of the data session to retrieve accounts for
     */
    public function list(
        $sessionID,
        ?RequestOptions $requestOptions = null
    ): AccountListResponse {
        $args = ['sessionID' => $sessionID];
        [$parsed, $options] = AccountListParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/data/accounts/list',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(AccountListResponse::class, value: $resp);
    }
}
