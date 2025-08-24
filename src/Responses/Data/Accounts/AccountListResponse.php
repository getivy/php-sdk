<?php

declare(strict_types=1);

namespace Getivy\Responses\Data\Accounts;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Data\Accounts\AccountListResponse\Account;

final class AccountListResponse implements BaseModel
{
    use SdkModel;

    /**
     * Array of bank accounts for the given data session.
     *
     * @var list<Account> $accounts
     */
    #[Api(list: Account::class)]
    public array $accounts;

    /**
     * `new AccountListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AccountListResponse::with(accounts: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AccountListResponse)->withAccounts(...)
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
     * @param list<Account> $accounts
     */
    public static function with(array $accounts): self
    {
        $obj = new self;

        $obj->accounts = $accounts;

        return $obj;
    }

    /**
     * Array of bank accounts for the given data session.
     *
     * @param list<Account> $accounts
     */
    public function withAccounts(array $accounts): self
    {
        $obj = clone $this;
        $obj->accounts = $accounts;

        return $obj;
    }
}
