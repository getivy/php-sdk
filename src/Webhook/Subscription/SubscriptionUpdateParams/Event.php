<?php

declare(strict_types=1);

namespace Getivy\Webhook\Subscription\SubscriptionUpdateParams;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class Event implements ConverterSource
{
    use SdkEnum;

    public const TEST = 'test';

    public const MERCHANT_UPDATED = 'merchant_updated';

    public const MERCHANT_APP_UPDATED = 'merchant_app_updated';

    public const ORDER_CREATED = 'order_created';

    public const ORDER_UPDATED = 'order_updated';

    public const REFUND_SUCCEEDED = 'refund_succeeded';

    public const REFUND_FAILED = 'refund_failed';

    public const REFUND_INITIATED = 'refund.initiated';

    public const REFUND_SUCCEEDED1 = 'refund.succeeded';

    public const REFUND_FAILED1 = 'refund.failed';

    public const PAYOUT_REPORT_REQUESTED = 'payout_report_requested';

    public const DATA_SESSION_COMPLETED = 'data_session_completed';

    public const CHECKOUT_SESSION_CREATED = 'checkout_session_created';

    public const CHECKOUT_SESSION_UPDATED = 'checkout_session_updated';

    public const CHECKOUT_SESSION_EXPIRED = 'checkout_session_expired';

    public const CHECKOUT_SESSION_COMPLETED = 'checkout_session_completed';

    public const PAYOUT_CREATED = 'payout_created';

    public const PAYOUT_UPDATED = 'payout_updated';

    public const MANDATE_SETUP_STARTED = 'mandate_setup_started';

    public const MANDATE_SETUP_SUCCEEDED = 'mandate_setup_succeeded';

    public const MANDATE_SETUP_FAILED = 'mandate_setup_failed';

    public const MANDATE_REVOKED = 'mandate_revoked';

    public const USER_PAYOUT_INITIATED = 'user_payout.initiated';

    public const USER_PAYOUT_FAILED = 'user_payout.failed';

    public const USER_PAYOUT_PAID = 'user_payout.paid';

    public const PAYOUT_INITIATED = 'payout.initiated';

    public const PAYOUT_FAILED = 'payout.failed';

    public const PAYOUT_PAID = 'payout.paid';

    public const DEPOSIT_RECEIVED = 'deposit.received';

    public const RETURN_INITIATED = 'return.initiated';

    public const RETURN_SUCCEEDED = 'return.succeeded';

    public const RETURN_FAILED = 'return.failed';

    public const RETURN_RETURNED = 'return.returned';
}
