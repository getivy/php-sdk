<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderExpireResponse\ClimateActionMode;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class Type implements ConverterSource
{
    use SdkEnum;

    public const TRANSACTION = 'transaction';

    public const AMOUNT = 'amount';
}
