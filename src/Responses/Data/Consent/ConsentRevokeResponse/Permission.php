<?php

declare(strict_types=1);

namespace Getivy\Responses\Data\Consent\ConsentRevokeResponse;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class Permission implements ConverterSource
{
    use SdkEnum;

    public const ACCOUNTS = 'accounts';

    public const BALANCES = 'balances';

    public const TRANSACTIONS = 'transactions';
}
