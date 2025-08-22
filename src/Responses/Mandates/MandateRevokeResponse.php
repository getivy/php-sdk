<?php

declare(strict_types=1);

namespace Getivy\Responses\Mandates;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

final class MandateRevokeResponse implements BaseModel
{
    use SdkModel;

    /**
     * Indicates whether the mandate was successfully revoked.
     */
    #[Api]
    public bool $success;

    /**
     * `new MandateRevokeResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MandateRevokeResponse::with(success: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MandateRevokeResponse)->withSuccess(...)
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
    public static function with(bool $success): self
    {
        $obj = new self;

        $obj->success = $success;

        return $obj;
    }

    /**
     * Indicates whether the mandate was successfully revoked.
     */
    public function withSuccess(bool $success): self
    {
        $obj = clone $this;
        $obj->success = $success;

        return $obj;
    }
}
