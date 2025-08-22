<?php

declare(strict_types=1);

namespace Getivy\Responses\Checkoutsession\CheckoutsessionExpireResponse;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

final class Required implements BaseModel
{
    use SdkModel;

    #[Api]
    public bool $phone;

    /**
     * `new Required()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Required::with(phone: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Required)->withPhone(...)
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
    public static function with(bool $phone): self
    {
        $obj = new self;

        $obj->phone = $phone;

        return $obj;
    }

    public function withPhone(bool $phone): self
    {
        $obj = clone $this;
        $obj->phone = $phone;

        return $obj;
    }
}
