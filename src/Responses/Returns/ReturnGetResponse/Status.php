<?php

declare(strict_types=1);

namespace Getivy\Responses\Returns\ReturnGetResponse;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

/**
 * The status of the return.
 */
final class Status implements ConverterSource
{
    use SdkEnum;

    public const INITIATED = 'initiated';

    public const SUCCEEDED = 'succeeded';

    public const FAILED = 'failed';

    public const RETURNED = 'returned';
}
