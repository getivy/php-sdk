<?php

declare(strict_types=1);

namespace Getivy\Payouts;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Retrieve a payout object by id.
 */
final class PayoutRetrieveParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The payout ID.
     */
    #[Api]
    public string $id;

    /**
     * `new PayoutRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PayoutRetrieveParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PayoutRetrieveParams)->withID(...)
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
    public static function with(string $id): self
    {
        $obj = new self;

        $obj->id = $id;

        return $obj;
    }

    /**
     * The payout ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
