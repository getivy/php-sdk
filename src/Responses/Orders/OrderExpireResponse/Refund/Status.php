<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderExpireResponse\Refund;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

/**
 * The current status of this refund.
 */
final class Status implements ConverterSource
{
    use SdkEnum;

    public const PENDING = 'pending';

    public const SUCCEEDED = 'succeeded';

    public const FAILED = 'failed';

    public const REQUIRES_ACTION = 'requires_action';

    public const PARTIALLY_REFUNDED = 'partially_refunded';
}
