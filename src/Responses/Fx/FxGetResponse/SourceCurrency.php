<?php

declare(strict_types=1);

namespace Getivy\Responses\Fx\FxGetResponse;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

/**
 * The source currency code.
 */
final class SourceCurrency implements ConverterSource
{
    use SdkEnum;

    public const EUR = 'EUR';

    public const GBP = 'GBP';
}
