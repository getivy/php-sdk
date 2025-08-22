<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderGetResponse;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

/**
 * Deprecated. The status of the payment.
 */
final class PaymentStatus implements ConverterSource
{
    use SdkEnum;

    public const NOT_SETTLED = 'not_settled';

    public const FAILED = 'failed';

    public const CANCELED = 'canceled';

    public const PROCESSING = 'processing';

    public const REQUIRES_ACTION = 'requires_action';

    public const SUCCEEDED = 'succeeded';

    public const IN_REFUND = 'in_refund';

    public const REFUNDED = 'refunded';

    public const REFUND_FAILED = 'refund_failed';

    public const PARTIALLY_REFUNDED = 'partially_refunded';

    public const DISPUTED = 'disputed';
}
