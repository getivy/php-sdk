<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderExpireResponse\StatusHistoryList;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class Reason implements ConverterSource
{
    use SdkEnum;

    public const ORDER_CREATED = 'ORDER_CREATED';

    public const CHECKOUT_SESSION_ABORTED = 'CHECKOUT_SESSION_ABORTED';

    public const PAYMENT_SUCCEEDED = 'PAYMENT_SUCCEEDED';

    public const PAYMENT_INITIATED = 'PAYMENT_INITIATED';

    public const ORDER_CANCELED = 'ORDER_CANCELED';

    public const ORDER_EXPIRED_BY_MERCHANT = 'ORDER_EXPIRED_BY_MERCHANT';

    public const ORDER_REFUND_INITIATED = 'ORDER_REFUND_INITIATED';

    public const ORDER_REFUNDED = 'ORDER_REFUNDED';

    public const REFUND_CHARGE_SUCCEEDED = 'REFUND_CHARGE_SUCCEEDED';

    public const REFUND_UPDATED = 'REFUND_UPDATED';

    public const CHECKOUT_COMPLETED = 'CHECKOUT_COMPLETED';

    public const PIS_PAYMENT_INITIATED = 'PIS_PAYMENT_INITIATED';

    public const PIS_PAYMENT_UPDATED = 'PIS_PAYMENT_UPDATED';

    public const PIS_PAYMENT_SUCCEEDED = 'PIS_PAYMENT_SUCCEEDED';

    public const PAYMENT_NOT_SETTLED = 'PAYMENT_NOT_SETTLED';

    public const PAYMENT_INITIATION_FAILED = 'PAYMENT_INITIATION_FAILED';

    public const PAYMENT_CANCELED = 'PAYMENT_CANCELED';

    public const PAYMENT_FAILED = 'PAYMENT_FAILED';

    public const CHECKOUT_SESSION_CREATED = 'CHECKOUT_SESSION_CREATED';

    public const EXPIRED_CHECKOUT_SESSION_ABORTED = 'EXPIRED_CHECKOUT_SESSION_ABORTED';

    public const DISPUTE = 'DISPUTE';

    public const PENDING_PAYMENT_ATTEMPTS_FOUND = 'PENDING_PAYMENT_ATTEMPTS_FOUND';

    public const AML_FREEZE = 'AML_FREEZE';

    public const MANUAL_FREEZE = 'MANUAL_FREEZE';

    public const MANUAL_UNFREEZE = 'MANUAL_UNFREEZE';

    public const ORDER_MANUALLY_REOPENED = 'ORDER_MANUALLY_REOPENED';
}
