<?php

declare(strict_types=1);

namespace Getivy\Checkoutsession\CheckoutsessionCreateParams;

use Getivy\Checkoutsession\CheckoutsessionCreateParams\BillingAddress\Country;
use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

/**
 * The billing address of the customer.
 */
final class BillingAddress implements BaseModel
{
    use SdkModel;

    #[Api]
    public string $city;

    /** @var Country::* $country */
    #[Api(enum: Country::class)]
    public string $country;

    #[Api]
    public string $firstName;

    #[Api]
    public string $lastName;

    #[Api]
    public string $line1;

    #[Api]
    public string $line2;

    #[Api]
    public string $region;

    #[Api]
    public string $zipCode;

    /**
     * `new BillingAddress()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BillingAddress::with(
     *   city: ...,
     *   country: ...,
     *   firstName: ...,
     *   lastName: ...,
     *   line1: ...,
     *   line2: ...,
     *   region: ...,
     *   zipCode: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BillingAddress)
     *   ->withCity(...)
     *   ->withCountry(...)
     *   ->withFirstName(...)
     *   ->withLastName(...)
     *   ->withLine1(...)
     *   ->withLine2(...)
     *   ->withRegion(...)
     *   ->withZipCode(...)
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
     *
     * @param Country::* $country
     */
    public static function with(
        string $city,
        string $country,
        string $firstName,
        string $lastName,
        string $line1,
        string $line2,
        string $region,
        string $zipCode,
    ): self {
        $obj = new self;

        $obj->city = $city;
        $obj->country = $country;
        $obj->firstName = $firstName;
        $obj->lastName = $lastName;
        $obj->line1 = $line1;
        $obj->line2 = $line2;
        $obj->region = $region;
        $obj->zipCode = $zipCode;

        return $obj;
    }

    public function withCity(string $city): self
    {
        $obj = clone $this;
        $obj->city = $city;

        return $obj;
    }

    /**
     * @param Country::* $country
     */
    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj->country = $country;

        return $obj;
    }

    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj->firstName = $firstName;

        return $obj;
    }

    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->lastName = $lastName;

        return $obj;
    }

    public function withLine1(string $line1): self
    {
        $obj = clone $this;
        $obj->line1 = $line1;

        return $obj;
    }

    public function withLine2(string $line2): self
    {
        $obj = clone $this;
        $obj->line2 = $line2;

        return $obj;
    }

    public function withRegion(string $region): self
    {
        $obj = clone $this;
        $obj->region = $region;

        return $obj;
    }

    public function withZipCode(string $zipCode): self
    {
        $obj = clone $this;
        $obj->zipCode = $zipCode;

        return $obj;
    }
}
