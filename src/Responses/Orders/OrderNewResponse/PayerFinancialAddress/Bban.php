<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderNewResponse\PayerFinancialAddress;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

final class Bban implements BaseModel
{
    use SdkModel;

    #[Api]
    public string $bban;

    #[Api(optional: true)]
    public ?string $accountHolderName;

    #[Api(optional: true)]
    public ?string $bic;

    /**
     * `new Bban()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Bban::with(bban: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Bban)->withBban(...)
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
        string $bban,
        ?string $accountHolderName = null,
        ?string $bic = null
    ): self {
        $obj = new self;

        $obj->bban = $bban;

        null !== $accountHolderName && $obj->accountHolderName = $accountHolderName;
        null !== $bic && $obj->bic = $bic;

        return $obj;
    }

    public function withBban(string $bban): self
    {
        $obj = clone $this;
        $obj->bban = $bban;

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
