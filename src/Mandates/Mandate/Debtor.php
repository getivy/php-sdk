<?php

declare(strict_types=1);

namespace Getivy\Mandates\Mandate;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Mandates\Mandate\Debtor\Account;

final class Debtor implements BaseModel
{
    use SdkModel;

    #[Api]
    public Account $account;

    /**
     * `new Debtor()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Debtor::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Debtor)->withAccount(...)
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
     */
    public static function with(Account $account): self
    {
        $obj = new self;

        $obj->account = $account;

        return $obj;
    }

    public function withAccount(Account $account): self
    {
        $obj = clone $this;
        $obj->account = $account;

        return $obj;
    }
}
