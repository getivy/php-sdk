<?php

declare(strict_types=1);

namespace Getivy\Core\Conversion;

use Getivy\Core\Conversion\Concerns\ArrayOf;
use Getivy\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class ListOf implements Converter
{
    use ArrayOf;

    private function empty(): array|object // @phpstan-ignore-line
    {
        return [];
    }
}
