<?php

declare(strict_types=1);

namespace Getivy\Responses\Customers;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

final class CustomerNewResponse implements BaseModel
{
    use SdkModel;

    /**
     * The id of the created customer.
     */
    #[Api]
    public string $id;

    /**
     * The email address of the created customer.
     */
    #[Api]
    public string $email;

    /**
     * `new CustomerNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomerNewResponse::with(id: ..., email: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomerNewResponse)->withID(...)->withEmail(...)
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
    public static function with(string $id, string $email): self
    {
        $obj = new self;

        $obj->id = $id;
        $obj->email = $email;

        return $obj;
    }

    /**
     * The id of the created customer.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The email address of the created customer.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }
}
