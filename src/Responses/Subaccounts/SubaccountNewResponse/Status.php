<?php

declare(strict_types=1);

namespace Getivy\Responses\Subaccounts\SubaccountNewResponse;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class Status implements ConverterSource
{
    use SdkEnum;

    public const ACTIVE = 'active';

    public const INACTIVE = 'inactive';
}
