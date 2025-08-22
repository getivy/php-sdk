<?php

declare(strict_types=1);

namespace Getivy\Responses\Data\Session\SessionGetResponse;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

/**
 * Prefill options for the data session.
 */
final class Prefill implements BaseModel
{
    use SdkModel;

    /**
     * The preselected bank ID.
     */
    #[Api('bankId', optional: true)]
    public ?string $bankID;

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
    public static function with(?string $bankID = null): self
    {
        $obj = new self;

        null !== $bankID && $obj->bankID = $bankID;

        return $obj;
    }

    /**
     * The preselected bank ID.
     */
    public function withBankID(string $bankID): self
    {
        $obj = clone $this;
        $obj->bankID = $bankID;

        return $obj;
    }
}
