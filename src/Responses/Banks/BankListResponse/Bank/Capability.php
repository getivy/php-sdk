<?php

declare(strict_types=1);

namespace Getivy\Responses\Banks\BankListResponse\Bank;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class Capability implements ConverterSource
{
    use SdkEnum;

    public const AIS = 'ais';

    public const PIS = 'pis';
}
