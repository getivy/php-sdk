<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderNewResponse\StatusClassification;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class Primary implements ConverterSource
{
    use SdkEnum;

    public const PAYMENT_AUTHORISATION_FAILED = 'payment_authorisation_failed';

    public const PAYMENT_EXECUTION_FAILED = 'payment_execution_failed';

    public const PAYMENT_ABANDONED = 'payment_abandoned';
}
