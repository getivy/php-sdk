<?php

declare(strict_types=1);

namespace Getivy\Banks;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Retrieve a bank object by its id. The id is a unique identifier of the bank within Ivy.
 */
final class BankRetrieveParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The id is a unique identifier of the bank within Ivy.
     */
    #[Api]
    public string $id;

    /**
     * `new BankRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BankRetrieveParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BankRetrieveParams)->withID(...)
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
     * The id is a unique identifier of the bank within Ivy.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
