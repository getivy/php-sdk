<?php

declare(strict_types=1);

namespace Getivy\Checkoutsession\CheckoutsessionCreateParams\Mandate\AdditionalDisplayInformation;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class Cadence implements ConverterSource
{
    use SdkEnum;

    public const BI_WEEKLY = 'BI_WEEKLY';

    public const WEEKLY = 'WEEKLY';

    public const MONTHLY = 'MONTHLY';

    public const QUARTERLY = 'QUARTERLY';

    public const SEMI_ANNUAL = 'SEMI_ANNUAL';

    public const ANNUAL = 'ANNUAL';

    public const ON_DEMAND = 'ON_DEMAND';
}
