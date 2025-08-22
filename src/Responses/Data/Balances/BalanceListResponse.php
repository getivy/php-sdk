<?php

declare(strict_types=1);

namespace Getivy\Responses\Data\Balances;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Core\Conversion\ListOf;
use Getivy\Responses\Data\Balances\BalanceListResponse\Balance;

final class BalanceListResponse implements BaseModel
{
    use SdkModel;

    /**
     * Array of account balances for the given data session.
     *
     * @var list<Balance> $balances
     */
    #[Api(type: new ListOf(Balance::class))]
    public array $balances;

    /**
     * `new BalanceListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BalanceListResponse::with(balances: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BalanceListResponse)->withBalances(...)
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
     * @param list<Balance> $balances
     */
    public static function with(array $balances): self
    {
        $obj = new self;

        $obj->balances = $balances;

        return $obj;
    }

    /**
     * Array of account balances for the given data session.
     *
     * @param list<Balance> $balances
     */
    public function withBalances(array $balances): self
    {
        $obj = clone $this;
        $obj->balances = $balances;

        return $obj;
    }
}
