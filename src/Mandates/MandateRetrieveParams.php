<?php

declare(strict_types=1);

namespace Getivy\Mandates;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Retrieves a direct debit mandate with mandate id.
 */
final class MandateRetrieveParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * A valid mandate id. This can be retrieved from the `mandate_setup_succeeded` event.
     */
    #[Api]
    public string $id;

    /**
     * `new MandateRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MandateRetrieveParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MandateRetrieveParams)->withID(...)
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
     * A valid mandate id. This can be retrieved from the `mandate_setup_succeeded` event.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
