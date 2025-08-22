<?php

declare(strict_types=1);

namespace Getivy\Customers;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Search for customers you have previously created using filters, e.g. by email.
 */
final class CustomerSearchParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * Search for customers by email.
     */
    #[Api]
    public string $email;

    /**
     * A limit on the number of objects to be returned.
     */
    #[Api(optional: true)]
    public ?float $limit;

    /**
     * The number of items to skip.
     */
    #[Api(optional: true)]
    public ?float $skip;

    /**
     * `new CustomerSearchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomerSearchParams::with(email: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomerSearchParams)->withEmail(...)
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
        string $email,
        ?float $limit = null,
        ?float $skip = null
    ): self {
        $obj = new self;

        $obj->email = $email;

        null !== $limit && $obj->limit = $limit;
        null !== $skip && $obj->skip = $skip;

        return $obj;
    }

    /**
     * Search for customers by email.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * A limit on the number of objects to be returned.
     */
    public function withLimit(float $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * The number of items to skip.
     */
    public function withSkip(float $skip): self
    {
        $obj = clone $this;
        $obj->skip = $skip;

        return $obj;
    }
}
