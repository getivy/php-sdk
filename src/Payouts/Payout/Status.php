<?php

declare(strict_types=1);

namespace Getivy\Payouts\Payout;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

/**
 * The payout status.
 */
final class Status implements ConverterSource
{
    use SdkEnum;

    public const PAID = 'paid';

    public const PENDING = 'pending';

    public const IN_TRANSIT = 'in_transit';

    public const FAILED = 'failed';

    public const CANCELED = 'canceled';
}
