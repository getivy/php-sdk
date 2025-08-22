<?php

declare(strict_types=1);

namespace Getivy\Checkoutsession;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Retrieve a Checkout Session and its details by Ivy id.
 */
final class CheckoutsessionRetrieveParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The checkout session id to retrieve details for.
     */
    #[Api]
    public string $id;

    /**
     * `new CheckoutsessionRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CheckoutsessionRetrieveParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CheckoutsessionRetrieveParams)->withID(...)
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
     * The checkout session id to retrieve details for.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
