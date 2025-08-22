<?php

declare(strict_types=1);

namespace Getivy\Responses\Banks\BankSearchResponse\Bank;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class SupportedPaymentScheme implements ConverterSource
{
    use SdkEnum;

    public const SEPA_INSTANT = 'SEPA_INSTANT';

    public const FASTER_PAYMENTS = 'FASTER_PAYMENTS';

    public const SEPA = 'SEPA';

    public const ELIXIR = 'ELIXIR';

    public const EXPRESS_ELIXIR = 'EXPRESS_ELIXIR';

    public const SEK_ACCOUNT_TO_ACCOUNT = 'SEK_ACCOUNT_TO_ACCOUNT';

    public const SUMCLEARING = 'SUMCLEARING';

    public const STRAKSCLEARING = 'STRAKSCLEARING';

    public const SWIFT = 'SWIFT';

    public const INTERNAL = 'INTERNAL';

    public const TARGET = 'TARGET';
}
