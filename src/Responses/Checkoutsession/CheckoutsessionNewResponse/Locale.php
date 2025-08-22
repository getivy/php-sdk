<?php

declare(strict_types=1);

namespace Getivy\Responses\Checkoutsession\CheckoutsessionNewResponse;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class Locale implements ConverterSource
{
    use SdkEnum;

    public const DE = 'de';

    public const NL = 'nl';

    public const EN = 'en';

    public const FR = 'fr';

    public const ES = 'es';

    public const FI = 'fi';

    public const IT = 'it';

    public const PT = 'pt';

    public const SV = 'sv';

    public const PL = 'pl';

    public const SK = 'sk';

    public const LT = 'lt';
}
