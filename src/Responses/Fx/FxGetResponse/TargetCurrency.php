<?php

declare(strict_types=1);

namespace Getivy\Responses\Fx\FxGetResponse;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

/**
 * The target currency code.
 */
final class TargetCurrency implements ConverterSource
{
    use SdkEnum;

    public const USDC = 'USDC';
}
