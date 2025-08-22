<?php

declare(strict_types=1);

namespace Getivy\Responses\Checkoutsession\CheckoutsessionExpireResponse;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class PaymentMode implements ConverterSource
{
    use SdkEnum;

    public const DIRECT = 'direct';

    public const SETTLEMENT = 'settlement';
}
