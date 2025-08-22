<?php

declare(strict_types=1);

namespace Getivy\Responses\Payouts\PayoutListResponse\Item;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

/**
 * The payout type.
 */
final class Type implements ConverterSource
{
    use SdkEnum;

    public const BENEFICIARY = 'beneficiary';

    public const CUSTOMER = 'customer';
}
