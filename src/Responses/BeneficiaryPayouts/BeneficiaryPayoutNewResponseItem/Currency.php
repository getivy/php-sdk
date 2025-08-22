<?php

declare(strict_types=1);

namespace Getivy\Responses\BeneficiaryPayouts\BeneficiaryPayoutNewResponseItem;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

/**
 * The currency of the payout.
 */
final class Currency implements ConverterSource
{
    use SdkEnum;

    public const EUR = 'EUR';

    public const GBP = 'GBP';

    public const PLN = 'PLN';

    public const SEK = 'SEK';

    public const DKK = 'DKK';
}
