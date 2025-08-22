<?php

declare(strict_types=1);

namespace Getivy\Data\Consent;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Revokes a consent by session ID.
 */
final class ConsentRevokeParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the data session to which the consent belongs.
     */
    #[Api('sessionId')]
    public string $sessionID;

    /**
     * `new ConsentRevokeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConsentRevokeParams::with(sessionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConsentRevokeParams)->withSessionID(...)
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
    public static function with(string $sessionID): self
    {
        $obj = new self;

        $obj->sessionID = $sessionID;

        return $obj;
    }

    /**
     * The ID of the data session to which the consent belongs.
     */
    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj->sessionID = $sessionID;

        return $obj;
    }
}
