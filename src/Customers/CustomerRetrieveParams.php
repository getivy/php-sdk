<?php

declare(strict_types=1);

namespace Getivy\Customers;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Retrieve a Customer Object by its id.
 */
final class CustomerRetrieveParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The id of the customer.
     */
    #[Api]
    public string $id;

    /**
     * `new CustomerRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomerRetrieveParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomerRetrieveParams)->withID(...)
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
     * The id of the customer.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
