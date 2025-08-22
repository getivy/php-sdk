<?php

declare(strict_types=1);

namespace Getivy\Responses\Data\Consent\ConsentRevokeResponse;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

/**
 * The current status of the consent.
 */
final class Status implements ConverterSource
{
    use SdkEnum;

    public const REVOKED = 'revoked';
}
