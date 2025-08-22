<?php

declare(strict_types=1);

namespace Getivy\Responses\Checkoutsession\CheckoutsessionExpireResponse;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class Status implements ConverterSource
{
    use SdkEnum;

    public const OPEN = 'open';

    public const CLOSED = 'closed';

    public const EXPIRED = 'expired';
}
