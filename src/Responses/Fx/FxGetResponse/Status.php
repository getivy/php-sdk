<?php

declare(strict_types=1);

namespace Getivy\Responses\Fx\FxGetResponse;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

/**
 * The status of the FX transaction.
 */
final class Status implements ConverterSource
{
    use SdkEnum;

    public const SUCCESS = 'success';

    public const PROCESSING = 'processing';

    public const FAILED = 'failed';
}
