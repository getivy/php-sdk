<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderExpireResponse\Mandate;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Orders\OrderExpireResponse\Mandate\AdditionalDisplayInformation\Cadence;
use Getivy\Responses\Orders\OrderExpireResponse\Mandate\AdditionalDisplayInformation\Price;

final class AdditionalDisplayInformation implements BaseModel
{
    use SdkModel;

    /** @var Cadence::*|null $cadence */
    #[Api(enum: Cadence::class, optional: true)]
    public ?string $cadence;

    #[Api(optional: true)]
    public ?Price $price;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Cadence::*|null $cadence
     */
    public static function with(
        ?string $cadence = null,
        ?Price $price = null
    ): self {
        $obj = new self;

        null !== $cadence && $obj->cadence = $cadence;
        null !== $price && $obj->price = $price;

        return $obj;
    }

    /**
     * @param Cadence::* $cadence
     */
    public function withCadence(string $cadence): self
    {
        $obj = clone $this;
        $obj->cadence = $cadence;

        return $obj;
    }

    public function withPrice(Price $price): self
    {
        $obj = clone $this;
        $obj->price = $price;

        return $obj;
    }
}
