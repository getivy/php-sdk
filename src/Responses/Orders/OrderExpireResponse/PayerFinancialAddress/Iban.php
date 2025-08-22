<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderExpireResponse\PayerFinancialAddress;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

final class Iban implements BaseModel
{
    use SdkModel;

    #[Api]
    public string $iban;

    #[Api(optional: true)]
    public ?string $accountHolderName;

    #[Api(optional: true)]
    public ?string $bic;

    /**
     * `new Iban()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Iban::with(iban: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Iban)->withIban(...)
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
        string $iban,
        ?string $accountHolderName = null,
        ?string $bic = null
    ): self {
        $obj = new self;

        $obj->iban = $iban;

        null !== $accountHolderName && $obj->accountHolderName = $accountHolderName;
        null !== $bic && $obj->bic = $bic;

        return $obj;
    }

    public function withIban(string $iban): self
    {
        $obj = clone $this;
        $obj->iban = $iban;

        return $obj;
    }

    public function withAccountHolderName(string $accountHolderName): self
    {
        $obj = clone $this;
        $obj->accountHolderName = $accountHolderName;

        return $obj;
    }

    public function withBic(string $bic): self
    {
        $obj = clone $this;
        $obj->bic = $bic;

        return $obj;
    }
}
