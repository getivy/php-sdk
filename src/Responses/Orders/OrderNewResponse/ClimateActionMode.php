<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderNewResponse;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Orders\OrderNewResponse\ClimateActionMode\Type;

final class ClimateActionMode implements BaseModel
{
    use SdkModel;

    #[Api]
    public float $amount;

    /** @var Type::* $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new ClimateActionMode()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ClimateActionMode::with(amount: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ClimateActionMode)->withAmount(...)->withType(...)
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
     *
     * @param Type::* $type
     */
    public static function with(float $amount, string $type): self
    {
        $obj = new self;

        $obj->amount = $amount;
        $obj->type = $type;

        return $obj;
    }

    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * @param Type::* $type
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }
}
