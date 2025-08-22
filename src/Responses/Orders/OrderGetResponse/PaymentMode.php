<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderGetResponse;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

/**
 * The payment mode of the order. Can be either settlement or direct.
 */
final class PaymentMode implements ConverterSource
{
    use SdkEnum;

    public const DIRECT = 'direct';

    public const SETTLEMENT = 'settlement';
}
