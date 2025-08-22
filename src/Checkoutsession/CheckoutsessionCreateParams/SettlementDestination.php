<?php

declare(strict_types=1);

namespace Getivy\Checkoutsession\CheckoutsessionCreateParams;

use Getivy\Checkoutsession\CheckoutsessionCreateParams\SettlementDestination\FinancialAddress;
use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

final class SettlementDestination implements BaseModel
{
    use SdkModel;

    #[Api]
    public string $reference;

    #[Api(optional: true)]
    public ?FinancialAddress $financialAddress;

    /**
     * `new SettlementDestination()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettlementDestination::with(reference: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SettlementDestination)->withReference(...)
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
        string $reference,
        ?FinancialAddress $financialAddress = null
    ): self {
        $obj = new self;

        $obj->reference = $reference;

        null !== $financialAddress && $obj->financialAddress = $financialAddress;

        return $obj;
    }

    public function withReference(string $reference): self
    {
        $obj = clone $this;
        $obj->reference = $reference;

        return $obj;
    }

    public function withFinancialAddress(
        FinancialAddress $financialAddress
    ): self {
        $obj = clone $this;
        $obj->financialAddress = $financialAddress;

        return $obj;
    }
}
