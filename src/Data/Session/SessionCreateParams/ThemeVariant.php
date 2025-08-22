<?php

declare(strict_types=1);

namespace Getivy\Data\Session\SessionCreateParams;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

/**
 * The theme variant which will be used in the data session. If not provided, the default light theme will be used.
 */
final class ThemeVariant implements ConverterSource
{
    use SdkEnum;

    public const LIGHT = 'light';

    public const DARK = 'dark';
}
