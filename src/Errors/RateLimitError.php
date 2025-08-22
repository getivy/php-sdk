<?php

namespace Getivy\Errors;

class RateLimitError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Getivy Rate Limit Error';
}
