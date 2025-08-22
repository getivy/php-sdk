<?php

declare(strict_types=1);

namespace Getivy\Services\Data;

use Getivy\Client;
use Getivy\Contracts\Data\TransactionsContract;
use Getivy\Core\Conversion;
use Getivy\Core\Util;
use Getivy\Data\Transactions\TransactionListParams;
use Getivy\RequestOptions;
use Getivy\Responses\Data\Transactions\TransactionListResponse;

final class TransactionsService implements TransactionsContract
{
    public function __construct(private Client $client) {}

    /**
     * Retrieves the list of transactions for a given data session. Returns transactions from the last 3 months.
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
            path: 'api/service/data/transactions/list',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(TransactionListResponse::class, value: $resp);
    }
}
