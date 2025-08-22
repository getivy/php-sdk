<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderExpireResponse\StatusClassification;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class Secondary implements ConverterSource
{
    use SdkEnum;

    public const TIMEOUT = 'timeout';

    public const WRONG_CREDENTIALS = 'wrong_credentials';

    public const INCORRECT_2FA_RESPONSE = 'incorrect_2fa_response';

    public const PAYMENT_REJECTED = 'payment_rejected';

    public const INSUFFICIENT_FUNDS = 'insufficient_funds';

    public const CANCELLED = 'cancelled';

    public const CONNECTION_TO_BANK_FAILED = 'connection_to_bank_failed';

    public const INTERNATIONAL_TRANSFER_BLOCKED = 'international_transfer_blocked';

    public const INTERNATIONAL_TRANSFER_LIMIT_EXCEEDED = 'international_transfer_limit_exceeded';

    public const USER_BLOCKED = 'user_blocked';

    public const BANK_ERROR = 'bank_error';

    public const INSTANT_TRANSFERS_NOT_ENABLED = 'instant_transfers_not_enabled';

    public const NO_ACTIVE_TAN_METHODS_AVAILABLE = 'no_active_tan_methods_available';

    public const ACCOUNT_LIMIT_EXCEEDED = 'account_limit_exceeded';

    public const BANK_UNDER_MAINTENANCE = 'bank_under_maintenance';

    public const PIN_BLOCKED = 'pin_blocked';

    public const PAYMENT_NOT_SETTLED = 'payment_not_settled';

    public const UNSUPPORTED_BANK_ACCOUNT = 'unsupported_bank_account';
}
