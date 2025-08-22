<?php

namespace Getivy\Errors;

class PermissionDeniedError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Getivy Permission Denied Error';
}
