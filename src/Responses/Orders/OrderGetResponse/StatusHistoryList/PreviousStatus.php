<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderGetResponse\StatusHistoryList;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class PreviousStatus implements ConverterSource
{
    use SdkEnum;

    public const FAILED = 'failed';

    public const CANCELED = 'canceled';

    public const PROCESSING = 'processing';

    public const WAITING_FOR_PAYMENT = 'waiting_for_payment';

    public const PAID = 'paid';

    public const IN_REFUND = 'in_refund';

    public const REFUNDED = 'refunded';

    public const REFUND_FAILED = 'refund_failed';

    public const PARTIALLY_REFUNDED = 'partially_refunded';

    public const IN_DISPUTE = 'in_dispute';

    public const DISPUTED = 'disputed';

    public const REFUSED = 'refused';
}
