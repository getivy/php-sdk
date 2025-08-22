<?php

declare(strict_types=1);

namespace Getivy\Checkoutsession\CheckoutsessionCreateParams;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class ThemeVariant implements ConverterSource
{
    use SdkEnum;

    public const LIGHT = 'light';

    public const DARK = 'dark';
}
