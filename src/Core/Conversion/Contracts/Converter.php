<?php

declare(strict_types=1);

namespace Getivy\Core\Conversion\Contracts;

use Getivy\Core\Conversion\CoerceState;
use Getivy\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
