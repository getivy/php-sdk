<?php

declare(strict_types=1);

namespace Getivy\Payouts\PayoutCreateParams\Destination;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class Type implements ConverterSource
{
    use SdkEnum;

    public const BENEFICIARY = 'beneficiary';
}
