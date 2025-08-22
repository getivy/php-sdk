<?php

declare(strict_types=1);

namespace Getivy\Charges\ChargeCreateParams;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

/**
 * Additional data to be stored with the charge.
 */
final class Metadata implements BaseModel
{
    use SdkModel;

    /**
     * A token to verify incoming webhooks. Used in the shopware plugin. Limited to 200 characters.
     */
    #[Api(optional: true)]
    public ?string $verificationToken;

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
    public static function with(?string $verificationToken = null): self
    {
        $obj = new self;

        null !== $verificationToken && $obj->verificationToken = $verificationToken;

        return $obj;
    }

    /**
     * A token to verify incoming webhooks. Used in the shopware plugin. Limited to 200 characters.
     */
    public function withVerificationToken(string $verificationToken): self
    {
        $obj = clone $this;
        $obj->verificationToken = $verificationToken;

        return $obj;
    }
}
