<?php

declare(strict_types=1);

namespace Getivy\Checkoutsession\CheckoutsessionCreateParams;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

/**
 * The values specified here will be pre-filled in the Ivy Checkout.
 */
final class Prefill implements BaseModel
{
    use SdkModel;

    /**
     * Retrieve a valid bankId with the POST /banks/search endpoint. When presented in this field, the customer will skip the bank selection in the Ivy Checkout.
     */
    #[Api('bankId', optional: true)]
    public ?string $bankID;

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
    public static function with(?string $bankID = null): self
    {
        $obj = new self;

        null !== $bankID && $obj->bankID = $bankID;

        return $obj;
    }

    /**
     * Retrieve a valid bankId with the POST /banks/search endpoint. When presented in this field, the customer will skip the bank selection in the Ivy Checkout.
     */
    public function withBankID(string $bankID): self
    {
        $obj = clone $this;
        $obj->bankID = $bankID;

        return $obj;
    }
}
