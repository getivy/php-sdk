<?php

namespace Getivy\Errors;

class UnprocessableEntityError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Getivy Unprocessable Entity Error';
}
