<?php

declare(strict_types=1);

namespace Getivy\Refunds\Refund;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class RefundStatus implements ConverterSource
{
    use SdkEnum;

    public const PENDING = 'pending';

    public const SUCCEEDED = 'succeeded';

    public const FAILED = 'failed';

    public const REQUIRES_ACTION = 'requires_action';

    public const PARTIALLY_REFUNDED = 'partially_refunded';
}
