<?php

declare(strict_types=1);

namespace Getivy\Services;

use Getivy\Client;
use Getivy\Contracts\TransactionsContract;
use Getivy\Core\Conversion;
use Getivy\Core\Util;
use Getivy\RequestOptions;
use Getivy\Responses\Transactions\TransactionListResponse;
use Getivy\Transactions\TransactionListParams;

final class TransactionsService implements TransactionsContract
{
    public function __construct(private Client $client) {}

    /**
     * Retrieve a paginated list of transactions for the specified time period.
     *
     * @param float $from Start timestamp (inclusive) - unix timestamp
     * @param float $to End timestamp (exclusive) - unix timestamp
     * @param string $afterCursor Cursor for pagination
     */
    public function list(
        $from,
        $to,
        $afterCursor = null,
        ?RequestOptions $requestOptions = null
    ): TransactionListResponse {
        $args = ['from' => $from, 'to' => $to, 'afterCursor' => $afterCursor];
        $args = Util::array_filter_null($args, ['afterCursor']);
        [$parsed, $options] = TransactionListParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/transaction/list',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(TransactionListResponse::class, value: $resp);
    }
}
