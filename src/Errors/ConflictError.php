<?php

namespace Getivy\Errors;

class ConflictError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Getivy Conflict Error';
}
