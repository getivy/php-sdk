<?php

declare(strict_types=1);

namespace Getivy\Mandates\Mandate\Creditor;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

final class Address implements BaseModel
{
    use SdkModel;

    #[Api]
    public string $city;

    #[Api]
    public string $country;

    #[Api]
    public string $postalCode;

    #[Api]
    public string $street;

    /**
     * `new Address()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Address::with(city: ..., country: ..., postalCode: ..., street: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Address)
     *   ->withCity(...)
     *   ->withCountry(...)
     *   ->withPostalCode(...)
     *   ->withStreet(...)
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
        string $city,
        string $country,
        string $postalCode,
        string $street
    ): self {
        $obj = new self;

        $obj->city = $city;
        $obj->country = $country;
        $obj->postalCode = $postalCode;
        $obj->street = $street;

        return $obj;
    }

    public function withCity(string $city): self
    {
        $obj = clone $this;
        $obj->city = $city;

        return $obj;
    }

    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj->country = $country;

        return $obj;
    }

    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj->postalCode = $postalCode;

        return $obj;
    }

    public function withStreet(string $street): self
    {
        $obj = clone $this;
        $obj->street = $street;

        return $obj;
    }
}
