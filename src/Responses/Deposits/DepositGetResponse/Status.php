<?php

declare(strict_types=1);

namespace Getivy\Responses\Deposits\DepositGetResponse;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

/**
 * The status of the deposit.
 */
final class Status implements ConverterSource
{
    use SdkEnum;

    public const RECEIVED = 'received';
}
