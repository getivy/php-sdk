<?php

declare(strict_types=1);

namespace Getivy\Orders\OrderCreateParams;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

/**
 * The customer of the merchant.
 */
final class Customer implements BaseModel
{
    use SdkModel;

    /**
     * The Ivy id of the customer.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The email of the customer.
     */
    #[Api(optional: true)]
    public ?string $email;

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
    public static function with(?string $id = null, ?string $email = null): self
    {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $email && $obj->email = $email;

        return $obj;
    }

    /**
     * The Ivy id of the customer.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The email of the customer.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }
}
