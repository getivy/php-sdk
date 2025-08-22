<?php

declare(strict_types=1);

namespace Getivy\Responses\Data\Session\SessionNewResponse;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

/**
 * The status of the data session.
 */
final class Status implements ConverterSource
{
    use SdkEnum;

    public const OPEN = 'open';

    public const CLOSED = 'closed';

    public const EXPIRED = 'expired';
}
