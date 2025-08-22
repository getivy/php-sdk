<?php

namespace Getivy\Errors;

class BadRequestError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Getivy Bad Request Error';
}
