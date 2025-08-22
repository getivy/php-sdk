<?php

namespace Getivy\Errors;

class NotFoundError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Getivy Not Found Error';
}
