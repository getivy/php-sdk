<?php

declare(strict_types=1);

namespace Getivy\Responses\BeneficiaryPayouts\BeneficiaryPayoutNewResponseItem;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

/**
 * The type of payout.
 */
final class Type implements ConverterSource
{
    use SdkEnum;

    public const MERCHANT = 'merchant';

    public const CUSTOMER = 'customer';
}
