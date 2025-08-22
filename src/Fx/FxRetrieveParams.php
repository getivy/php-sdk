<?php

declare(strict_types=1);

namespace Getivy\Fx;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Retrieve the details of a past fx transfer using the fxId.
 */
final class FxRetrieveParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The fxId attached to the transfer.
     */
    #[Api('fxId')]
    public string $fxID;

    /**
     * `new FxRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FxRetrieveParams::with(fxID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FxRetrieveParams)->withFxID(...)
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
    public static function with(string $fxID): self
    {
        $obj = new self;

        $obj->fxID = $fxID;

        return $obj;
    }

    /**
     * The fxId attached to the transfer.
     */
    public function withFxID(string $fxID): self
    {
        $obj = clone $this;
        $obj->fxID = $fxID;

        return $obj;
    }
}
