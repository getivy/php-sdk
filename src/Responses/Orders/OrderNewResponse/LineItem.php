<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderNewResponse;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Orders\OrderNewResponse\LineItem\Category;

final class LineItem implements BaseModel
{
    use SdkModel;

    /**
     * Accumulated cost in decimals. For example, for a lineItem with total price 3.00 and quantity 4, amount would be equal to 12.00.
     */
    #[Api]
    public float $amount;

    /**
     * Customer-facing name of the line item.
     */
    #[Api]
    public string $name;

    #[Api]
    public float $singleNet;

    #[Api]
    public float $singleVat;

    /** @var Category::*|null $category */
    #[Api(enum: Category::class, optional: true)]
    public ?string $category;

    #[Api(optional: true)]
    public ?float $co2Grams;

    #[Api('EAN', optional: true)]
    public ?string $ean;

    /**
     * An image of the line item. Valid URLs are accepted only.
     */
    #[Api(optional: true)]
    public ?string $image;

    /**
     * Quantity of this lineItem.
     */
    #[Api(optional: true)]
    public ?float $quantity;

    /**
     * An internal unique id stored to this line item.
     */
    #[Api('referenceId', optional: true)]
    public ?string $referenceID;

    /**
     * `new LineItem()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LineItem::with(amount: ..., name: ..., singleNet: ..., singleVat: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LineItem)
     *   ->withAmount(...)
     *   ->withName(...)
     *   ->withSingleNet(...)
     *   ->withSingleVat(...)
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
     * @param Category::* $category
     */
    public static function with(
        float $amount,
        string $name,
        float $singleNet,
        float $singleVat,
        ?string $category = null,
        ?float $co2Grams = null,
        ?string $ean = null,
        ?string $image = null,
        ?float $quantity = null,
        ?string $referenceID = null,
    ): self {
        $obj = new self;

        $obj->amount = $amount;
        $obj->name = $name;
        $obj->singleNet = $singleNet;
        $obj->singleVat = $singleVat;

        null !== $category && $obj->category = $category;
        null !== $co2Grams && $obj->co2Grams = $co2Grams;
        null !== $ean && $obj->ean = $ean;
        null !== $image && $obj->image = $image;
        null !== $quantity && $obj->quantity = $quantity;
        null !== $referenceID && $obj->referenceID = $referenceID;

        return $obj;
    }

    /**
     * Accumulated cost in decimals. For example, for a lineItem with total price 3.00 and quantity 4, amount would be equal to 12.00.
     */
    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * Customer-facing name of the line item.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withSingleNet(float $singleNet): self
    {
        $obj = clone $this;
        $obj->singleNet = $singleNet;

        return $obj;
    }

    public function withSingleVat(float $singleVat): self
    {
        $obj = clone $this;
        $obj->singleVat = $singleVat;

        return $obj;
    }

    /**
     * @param Category::* $category
     */
    public function withCategory(string $category): self
    {
        $obj = clone $this;
        $obj->category = $category;

        return $obj;
    }

    public function withCo2Grams(float $co2Grams): self
    {
        $obj = clone $this;
        $obj->co2Grams = $co2Grams;

        return $obj;
    }

    public function withEan(string $ean): self
    {
        $obj = clone $this;
        $obj->ean = $ean;

        return $obj;
    }

    /**
     * An image of the line item. Valid URLs are accepted only.
     */
    public function withImage(string $image): self
    {
        $obj = clone $this;
        $obj->image = $image;

        return $obj;
    }

    /**
     * Quantity of this lineItem.
     */
    public function withQuantity(float $quantity): self
    {
        $obj = clone $this;
        $obj->quantity = $quantity;

        return $obj;
    }

    /**
     * An internal unique id stored to this line item.
     */
    public function withReferenceID(string $referenceID): self
    {
        $obj = clone $this;
        $obj->referenceID = $referenceID;

        return $obj;
    }
}
