<?php

declare(strict_types=1);

namespace Getivy\Contracts\Data;

use Getivy\RequestOptions;
use Getivy\Responses\Data\Transactions\TransactionListResponse;

interface TransactionsContract
{
    /**
     * @param float $from Start timestamp (inclusive) - unix timestamp
     * @param float $to End timestamp (exclusive) - unix timestamp
     * @param string $afterCursor Cursor for pagination
     */
    public function list(
        $from,
        $to,
        $afterCursor = null,
        ?RequestOptions $requestOptions = null
    ): TransactionListResponse;
}
