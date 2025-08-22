<?php

declare(strict_types=1);

namespace Getivy\Responses\Customers\CustomerGetResponse\BankAccount;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

/**
 * Remembered bank details.
 */
final class Bank implements BaseModel
{
    use SdkModel;

    /**
     * The id of the bank.
     */
    #[Api]
    public string $id;

    /**
     * The name of the bank.
     */
    #[Api]
    public string $name;

    /**
     * URL address of bank logo image.
     */
    #[Api(optional: true)]
    public ?string $logo;

    /**
     * `new Bank()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Bank::with(id: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Bank)->withID(...)->withName(...)
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
        string $name,
        ?string $logo = null
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->name = $name;

        null !== $logo && $obj->logo = $logo;

        return $obj;
    }

    /**
     * The id of the bank.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The name of the bank.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * URL address of bank logo image.
     */
    public function withLogo(string $logo): self
    {
        $obj = clone $this;
        $obj->logo = $logo;

        return $obj;
    }
}
