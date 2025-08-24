<?php

declare(strict_types=1);

namespace Getivy\Payouts;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Payouts\PayoutListParams\Type;

/**
 * List payouts for a merchant.
 */
final class PayoutListParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?float $limit;

    #[Api(optional: true)]
    public ?float $skip;

    /** @var Type::*|null $type */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

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
    public static function with(
        ?float $limit = null,
        ?float $skip = null,
        ?string $type = null
    ): self {
        $obj = new self;

        null !== $limit && $obj->limit = $limit;
        null !== $skip && $obj->skip = $skip;
        null !== $type && $obj->type = $type;

        return $obj;
    }

    public function withLimit(float $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    public function withSkip(float $skip): self
    {
        $obj = clone $this;
        $obj->skip = $skip;

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
