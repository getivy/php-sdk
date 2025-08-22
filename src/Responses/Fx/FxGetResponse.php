<?php

declare(strict_types=1);

namespace Getivy\Responses\Fx;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Core\Conversion\MapOf;
use Getivy\Responses\Fx\FxGetResponse\SourceCurrency;
use Getivy\Responses\Fx\FxGetResponse\Status;
use Getivy\Responses\Fx\FxGetResponse\TargetCurrency;

final class FxGetResponse implements BaseModel
{
    use SdkModel;

    /**
     * The fxId attached to the transfer.
     */
    #[Api]
    public string $id;

    /**
     * The exchange rate for the given currency pair.
     */
    #[Api]
    public string $rate;

    /**
     * The source currency code.
     *
     * @var SourceCurrency::* $sourceCurrency
     */
    #[Api(enum: SourceCurrency::class)]
    public string $sourceCurrency;

    /**
     * The status of the FX transaction.
     *
     * @var Status::* $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * The target currency code.
     *
     * @var TargetCurrency::* $targetCurrency
     */
    #[Api(enum: TargetCurrency::class)]
    public string $targetCurrency;

    /**
     * Additional metadata.
     *
     * @var array<string, mixed>|null $metadata
     */
    #[Api(type: new MapOf('string'), optional: true)]
    public ?array $metadata;

    /**
     * The amount of source currency to convert.
     */
    #[Api(optional: true)]
    public ?string $sourceAmount;

    /**
     * The amount of the target currency for the given source amount.
     */
    #[Api(optional: true)]
    public ?string $targetAmount;

    /**
     * `new FxGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FxGetResponse::with(
     *   id: ..., rate: ..., sourceCurrency: ..., status: ..., targetCurrency: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FxGetResponse)
     *   ->withID(...)
     *   ->withRate(...)
     *   ->withSourceCurrency(...)
     *   ->withStatus(...)
     *   ->withTargetCurrency(...)
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
     * @param SourceCurrency::* $sourceCurrency
     * @param Status::* $status
     * @param TargetCurrency::* $targetCurrency
     * @param array<string, mixed>|null $metadata
     */
    public static function with(
        string $id,
        string $rate,
        string $sourceCurrency,
        string $status,
        string $targetCurrency,
        ?array $metadata = null,
        ?string $sourceAmount = null,
        ?string $targetAmount = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->rate = $rate;
        $obj->sourceCurrency = $sourceCurrency;
        $obj->status = $status;
        $obj->targetCurrency = $targetCurrency;

        null !== $metadata && $obj->metadata = $metadata;
        null !== $sourceAmount && $obj->sourceAmount = $sourceAmount;
        null !== $targetAmount && $obj->targetAmount = $targetAmount;

        return $obj;
    }

    /**
     * The fxId attached to the transfer.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The exchange rate for the given currency pair.
     */
    public function withRate(string $rate): self
    {
        $obj = clone $this;
        $obj->rate = $rate;

        return $obj;
    }

    /**
     * The source currency code.
     *
     * @param SourceCurrency::* $sourceCurrency
     */
    public function withSourceCurrency(string $sourceCurrency): self
    {
        $obj = clone $this;
        $obj->sourceCurrency = $sourceCurrency;

        return $obj;
    }

    /**
     * The status of the FX transaction.
     *
     * @param Status::* $status
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * The target currency code.
     *
     * @param TargetCurrency::* $targetCurrency
     */
    public function withTargetCurrency(string $targetCurrency): self
    {
        $obj = clone $this;
        $obj->targetCurrency = $targetCurrency;

        return $obj;
    }

    /**
     * Additional metadata.
     *
     * @param array<string, mixed> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }

    /**
     * The amount of source currency to convert.
     */
    public function withSourceAmount(string $sourceAmount): self
    {
        $obj = clone $this;
        $obj->sourceAmount = $sourceAmount;

        return $obj;
    }

    /**
     * The amount of the target currency for the given source amount.
     */
    public function withTargetAmount(string $targetAmount): self
    {
        $obj = clone $this;
        $obj->targetAmount = $targetAmount;

        return $obj;
    }
}
