<?php

declare(strict_types=1);

namespace Getivy\Fx\FxRetrieveRateParams;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

/**
 * The target currency code.
 */
final class TargetCurrency implements ConverterSource
{
    use SdkEnum;

    public const EUR = 'EUR';

    public const GBP = 'GBP';

    public const PLN = 'PLN';

    public const USDC = 'USDC';

    public const SEK = 'SEK';

    public const DKK = 'DKK';
}
