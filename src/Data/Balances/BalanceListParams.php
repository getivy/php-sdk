<?php

declare(strict_types=1);

namespace Getivy\Data\Balances;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Retrieves the list of account balances for a given data session.
 */
final class BalanceListParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the data session to retrieve account balances for.
     */
    #[Api('sessionId')]
    public string $sessionID;

    /**
     * `new BalanceListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BalanceListParams::with(sessionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BalanceListParams)->withSessionID(...)
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
     * The ID of the data session to retrieve account balances for.
     */
    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj->sessionID = $sessionID;

        return $obj;
    }
}
