<?php

declare(strict_types=1);

namespace Getivy\Responses\Payouts\PayoutListResponse\Item\Destination;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class Type implements ConverterSource
{
    use SdkEnum;

    public const IBAN = 'iban';

    public const SORT_CODE = 'sort_code';

    public const BANK_CODE = 'bank_code';

    public const BBAN = 'bban';
}
