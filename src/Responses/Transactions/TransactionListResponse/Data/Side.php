<?php

declare(strict_types=1);

namespace Getivy\Responses\Transactions\TransactionListResponse\Data;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

/**
 * Side of the transaction.
 */
final class Side implements ConverterSource
{
    use SdkEnum;

    public const CREDIT = 'credit';

    public const DEBIT = 'debit';
}
