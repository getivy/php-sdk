<?php

declare(strict_types=1);

namespace Getivy\Contracts;

use Getivy\RequestOptions;
use Getivy\Responses\Returns\ReturnGetResponse;
use Getivy\Responses\Returns\ReturnNewResponse;

interface ReturnsContract
{
    /**
     * @param string $depositID The ID of the associated deposit
     */
    public function create(
        $depositID,
        ?RequestOptions $requestOptions = null
    ): ReturnNewResponse;

    /**
     * @param string $id The ID of the return
     */
    public function retrieve(
        $id,
        ?RequestOptions $requestOptions = null
    ): ReturnGetResponse;
}
