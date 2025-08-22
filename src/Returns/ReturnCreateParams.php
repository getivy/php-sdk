<?php

declare(strict_types=1);

namespace Getivy\Returns;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Creates a return for a deposit.
 */
final class ReturnCreateParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the associated deposit.
     */
    #[Api('depositId')]
    public string $depositID;

    /**
     * `new ReturnCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReturnCreateParams::with(depositID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReturnCreateParams)->withDepositID(...)
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
    public static function with(string $depositID): self
    {
        $obj = new self;

        $obj->depositID = $depositID;

        return $obj;
    }

    /**
     * The ID of the associated deposit.
     */
    public function withDepositID(string $depositID): self
    {
        $obj = clone $this;
        $obj->depositID = $depositID;

        return $obj;
    }
}
