<?php

declare(strict_types=1);

namespace Getivy\Responses\Balance;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Balance\BalanceGetResponse\Balance;

final class BalanceGetResponse implements BaseModel
{
    use SdkModel;

    /**
     * Array of balance information for different currencies.
     *
     * @var list<Balance> $balances
     */
    #[Api(list: Balance::class)]
    public array $balances;

    /**
     * `new BalanceGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BalanceGetResponse::with(balances: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BalanceGetResponse)->withBalances(...)
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
     * Array of balance information for different currencies.
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
