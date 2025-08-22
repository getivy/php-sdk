<?php

declare(strict_types=1);

namespace Getivy\Mandates\Mandate;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Mandates\Mandate\Creditor\Address;

final class Creditor implements BaseModel
{
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public Address $address;

    #[Api]
    public string $name;

    /**
     * `new Creditor()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Creditor::with(id: ..., address: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Creditor)->withID(...)->withAddress(...)->withName(...)
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
        string $id,
        Address $address,
        string $name
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->address = $address;
        $obj->name = $name;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withAddress(Address $address): self
    {
        $obj = clone $this;
        $obj->address = $address;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
