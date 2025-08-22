<?php

declare(strict_types=1);

namespace Getivy\Responses\Checkoutsession\CheckoutsessionGetResponse\Price;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class Currency implements ConverterSource
{
    use SdkEnum;

    public const EUR = 'EUR';

    public const GBP = 'GBP';

    public const PLN = 'PLN';

    public const SEK = 'SEK';

    public const DKK = 'DKK';
}
