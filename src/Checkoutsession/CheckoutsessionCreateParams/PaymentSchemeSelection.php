<?php

declare(strict_types=1);

namespace Getivy\Checkoutsession\CheckoutsessionCreateParams;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class PaymentSchemeSelection implements ConverterSource
{
    use SdkEnum;

    public const INSTANT_PREFERRED = 'instant_preferred';

    public const STANDARD = 'standard';

    public const INSTANT_ONLY = 'instant_only';
}
