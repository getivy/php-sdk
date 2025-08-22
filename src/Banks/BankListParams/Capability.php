<?php

declare(strict_types=1);

namespace Getivy\Banks\BankListParams;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

/**
 * Filter banks with provided capability only. `ais` for data products, `pis` for payment products.
 */
final class Capability implements ConverterSource
{
    use SdkEnum;

    public const AIS = 'ais';

    public const PIS = 'pis';
}
