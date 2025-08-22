<?php

declare(strict_types=1);

namespace Getivy\Customers;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Create a new Customer representing your Customers. You can use the Customer to simplify the checkout process for returning journeys.
 */
final class CustomerCreateParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The email address of the customer.
     */
    #[Api]
    public string $email;

    /**
     * `new CustomerCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomerCreateParams::with(email: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomerCreateParams)->withEmail(...)
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
    public static function with(string $email): self
    {
        $obj = new self;

        $obj->email = $email;

        return $obj;
    }

    /**
     * The email address of the customer.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }
}
