<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderNewResponse;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class PaymentMethodType implements ConverterSource
{
    use SdkEnum;

    public const SEPA_DEBIT = 'sepa_debit';

    public const CUSTOMER_BALANCE = 'customer_balance';

    public const MANUAL_BANK_TRANSFER = 'manual_bank_transfer';
}
