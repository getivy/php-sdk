<?php

declare(strict_types=1);

namespace Getivy\Responses\Transactions;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Core\Conversion\ListOf;
use Getivy\Responses\Transactions\TransactionListResponse\Data;
use Getivy\Responses\Transactions\TransactionListResponse\Paging;

final class TransactionListResponse implements BaseModel
{
    use SdkModel;

    /**
     * Array of transactions.
     *
     * @var list<Data> $data
     */
    #[Api(type: new ListOf(Data::class))]
    public array $data;

    /**
     * Pagination information.
     */
    #[Api]
    public Paging $paging;

    /**
     * `new TransactionListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TransactionListResponse::with(data: ..., paging: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TransactionListResponse)->withData(...)->withPaging(...)
     * ```
     */
    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data> $data
     */
    public static function with(array $data, Paging $paging): self
    {
        $obj = new self;

        $obj->data = $data;
        $obj->paging = $paging;

        return $obj;
    }

    /**
     * Array of transactions.
     *
     * @param list<Data> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    /**
     * Pagination information.
     */
    public function withPaging(Paging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
