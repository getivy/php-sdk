<?php

declare(strict_types=1);

namespace Getivy\Deposits;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Retrieves a deposit by its ID.
 */
final class DepositRetrieveParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the deposit.
     */
    #[Api]
    public string $id;

    /**
     * `new DepositRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DepositRetrieveParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DepositRetrieveParams)->withID(...)
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
     * The ID of the deposit.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
