<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderNewResponse\MerchantFinancialAddress;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

final class Iban implements BaseModel
{
    use SdkModel;

    #[Api]
    public string $accountHolderName;

    #[Api]
    public string $iban;

    #[Api(optional: true)]
    public ?string $bic;

    /**
     * `new Iban()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Iban::with(accountHolderName: ..., iban: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Iban)->withAccountHolderName(...)->withIban(...)
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
    public static function with(
        string $accountHolderName,
        string $iban,
        ?string $bic = null
    ): self {
        $obj = new self;

        $obj->accountHolderName = $accountHolderName;
        $obj->iban = $iban;

        null !== $bic && $obj->bic = $bic;

        return $obj;
    }

    public function withAccountHolderName(string $accountHolderName): self
    {
        $obj = clone $this;
        $obj->accountHolderName = $accountHolderName;

        return $obj;
    }

    public function withIban(string $iban): self
    {
        $obj = clone $this;
        $obj->iban = $iban;

        return $obj;
    }

    public function withBic(string $bic): self
    {
        $obj = clone $this;
        $obj->bic = $bic;

        return $obj;
    }
}
