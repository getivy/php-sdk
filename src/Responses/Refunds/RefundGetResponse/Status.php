<?php

declare(strict_types=1);

namespace Getivy\Responses\Refunds\RefundGetResponse;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

/**
 * The current status of this refund.
 */
final class Status implements ConverterSource
{
    use SdkEnum;

    public const INITIATED = 'initiated';

    public const PENDING = 'pending';

    public const SUCCEEDED = 'succeeded';

    public const FAILED = 'failed';
}
