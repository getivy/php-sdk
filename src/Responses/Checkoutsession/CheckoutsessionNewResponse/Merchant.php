<?php

declare(strict_types=1);

namespace Getivy\Responses\Checkoutsession\CheckoutsessionNewResponse;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Checkoutsession\CheckoutsessionNewResponse\Merchant\Address;

final class Merchant implements BaseModel
{
    use SdkModel;

    #[Api]
    public string $id;

    #[Api('appId')]
    public string $appID;

    #[Api]
    public string $legalName;

    #[Api(optional: true)]
    public ?Address $address;

    /**
     * `new Merchant()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Merchant::with(id: ..., appID: ..., legalName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Merchant)->withID(...)->withAppID(...)->withLegalName(...)
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
        string $appID,
        string $legalName,
        ?Address $address = null
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->appID = $appID;
        $obj->legalName = $legalName;

        null !== $address && $obj->address = $address;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withAppID(string $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    public function withLegalName(string $legalName): self
    {
        $obj = clone $this;
        $obj->legalName = $legalName;

        return $obj;
    }

    public function withAddress(Address $address): self
    {
        $obj = clone $this;
        $obj->address = $address;

        return $obj;
    }
}
