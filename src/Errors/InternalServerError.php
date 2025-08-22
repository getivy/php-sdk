<?php

namespace Getivy\Errors;

class InternalServerError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Getivy Internal Server Error';
}
