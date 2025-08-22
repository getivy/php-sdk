<?php

declare(strict_types=1);

namespace Getivy\Payouts\PayoutListParams;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class Type implements ConverterSource
{
    use SdkEnum;

    public const CUSTOMER_PAYOUT = 'customer-payout';

    public const BENEFICIARY_PAYOUT = 'beneficiary-payout';
}
