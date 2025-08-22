<?php

declare(strict_types=1);

namespace Getivy\Contracts\Data;

use Getivy\RequestOptions;
use Getivy\Responses\Data\Accounts\AccountListResponse;

interface AccountsContract
{
    /**
     * @param string $sessionID the ID of the data session to retrieve accounts for
     */
    public function list(
        $sessionID,
        ?RequestOptions $requestOptions = null
    ): AccountListResponse;
}
