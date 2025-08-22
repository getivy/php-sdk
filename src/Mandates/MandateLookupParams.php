<?php

declare(strict_types=1);

namespace Getivy\Mandates;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Returns a Direct Debit Mandate when a valid mandate referenceId is given.
 */
final class MandateLookupParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * A valid mandate reference id. This is set by the merchant during the checkout session when the mandate setup is initiated.
     */
    #[Api('referenceId')]
    public string $referenceID;

    /**
     * `new MandateLookupParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MandateLookupParams::with(referenceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MandateLookupParams)->withReferenceID(...)
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
    public static function with(string $referenceID): self
    {
        $obj = new self;

        $obj->referenceID = $referenceID;

        return $obj;
    }

    /**
     * A valid mandate reference id. This is set by the merchant during the checkout session when the mandate setup is initiated.
     */
    public function withReferenceID(string $referenceID): self
    {
        $obj = clone $this;
        $obj->referenceID = $referenceID;

        return $obj;
    }
}
