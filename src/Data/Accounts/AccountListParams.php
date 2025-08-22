<?php

declare(strict_types=1);

namespace Getivy\Data\Accounts;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Retrieves the list of accounts for a given data session.
 */
final class AccountListParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the data session to retrieve accounts for.
     */
    #[Api('sessionId')]
    public string $sessionID;

    /**
     * `new AccountListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AccountListParams::with(sessionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AccountListParams)->withSessionID(...)
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
     * The ID of the data session to retrieve accounts for.
     */
    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj->sessionID = $sessionID;

        return $obj;
    }
}
