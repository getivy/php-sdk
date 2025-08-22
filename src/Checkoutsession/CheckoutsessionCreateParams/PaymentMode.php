<?php

declare(strict_types=1);

namespace Getivy\Checkoutsession\CheckoutsessionCreateParams;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

/**
 * The mode in which the payment should be processed. If direct is used, you need to provide a settlementDestination.
 */
final class PaymentMode implements ConverterSource
{
    use SdkEnum;

    public const DIRECT = 'direct';

    public const SETTLEMENT = 'settlement';
}
