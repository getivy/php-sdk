<?php

declare(strict_types=1);

namespace Getivy\Data\Session;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Retrieves the details of a data session by its ID.
 */
final class SessionRetrieveParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The id of the data session.
     */
    #[Api]
    public string $id;

    /**
     * `new SessionRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SessionRetrieveParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SessionRetrieveParams)->withID(...)
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
     * The id of the data session.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
