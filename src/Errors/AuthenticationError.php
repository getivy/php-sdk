<?php

namespace Getivy\Errors;

class AuthenticationError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Getivy Authentication Error';
}
