<?php

declare(strict_types=1);

namespace Getivy\Responses\Data\Session;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Core\Conversion\MapOf;
use Getivy\Responses\Data\Session\SessionGetResponse\Locale;
use Getivy\Responses\Data\Session\SessionGetResponse\Market;
use Getivy\Responses\Data\Session\SessionGetResponse\Prefill;
use Getivy\Responses\Data\Session\SessionGetResponse\Status;

final class SessionGetResponse implements BaseModel
{
    use SdkModel;

    /**
     * The id of the data session.
     */
    #[Api]
    public string $id;

    /**
     * The Epoch time in seconds at which the Session was created.
     */
    #[Api]
    public float $createdAt;

    /**
     * Whether customers can choose another bank than the pre-selected one.
     */
    #[Api]
    public bool $disableBankSelection;

    /**
     * Currently only visible in the merchant dashboard. This id used to be displayed to the user during the checkout.
     */
    #[Api('displayId')]
    public string $displayID;

    /**
     * The URL where users will be redirected after an unsuccessful session.
     */
    #[Api('errorCallbackUrl')]
    public string $errorCallbackURL;

    /**
     * The Epoch time in seconds at which the Session will expire.
     */
    #[Api]
    public float $expiresAt;

    /**
     * The id of the merchant.
     */
    #[Api('merchantId')]
    public string $merchantID;

    /**
     * An internal reference id for the data session.
     */
    #[Api('referenceId')]
    public string $referenceID;

    /**
     * The status of the data session.
     *
     * @var Status::* $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * The URL where users will be redirected after a successful session.
     */
    #[Api('successCallbackUrl')]
    public string $successCallbackURL;

    /**
     * The Epoch time in seconds at which the Session was updated.
     */
    #[Api]
    public float $updatedAt;

    /**
     * The locale of the data session.
     *
     * @var Locale::*|null $locale
     */
    #[Api(enum: Locale::class, optional: true)]
    public ?string $locale;

    /**
     * ISO 3166-1 alpha-2 country code of the market.
     *
     * @var Market::*|null $market
     */
    #[Api(enum: Market::class, optional: true)]
    public ?string $market;

    /**
     * Any data stored with this data session.
     *
     * @var array<string, mixed>|null $metadata
     */
    #[Api(type: new MapOf('string'), optional: true)]
    public ?array $metadata;

    /**
     * Prefill options for the data session.
     */
    #[Api(optional: true)]
    public ?Prefill $prefill;

    /**
     * `new SessionGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SessionGetResponse::with(
     *   id: ...,
     *   createdAt: ...,
     *   disableBankSelection: ...,
     *   displayID: ...,
     *   errorCallbackURL: ...,
     *   expiresAt: ...,
     *   merchantID: ...,
     *   referenceID: ...,
     *   status: ...,
     *   successCallbackURL: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SessionGetResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withDisableBankSelection(...)
     *   ->withDisplayID(...)
     *   ->withErrorCallbackURL(...)
     *   ->withExpiresAt(...)
     *   ->withMerchantID(...)
     *   ->withReferenceID(...)
     *   ->withStatus(...)
     *   ->withSuccessCallbackURL(...)
     *   ->withUpdatedAt(...)
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
     * @param Status::* $status
     * @param Locale::*|null $locale
     * @param Market::*|null $market
     * @param array<string, mixed>|null $metadata
     */
    public static function with(
        string $id,
        float $createdAt,
        bool $disableBankSelection,
        string $displayID,
        string $errorCallbackURL,
        float $expiresAt,
        string $merchantID,
        string $referenceID,
        string $status,
        string $successCallbackURL,
        float $updatedAt,
        ?string $locale = null,
        ?string $market = null,
        ?array $metadata = null,
        ?Prefill $prefill = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->disableBankSelection = $disableBankSelection;
        $obj->displayID = $displayID;
        $obj->errorCallbackURL = $errorCallbackURL;
        $obj->expiresAt = $expiresAt;
        $obj->merchantID = $merchantID;
        $obj->referenceID = $referenceID;
        $obj->status = $status;
        $obj->successCallbackURL = $successCallbackURL;
        $obj->updatedAt = $updatedAt;

        null !== $locale && $obj->locale = $locale;
        null !== $market && $obj->market = $market;
        null !== $metadata && $obj->metadata = $metadata;
        null !== $prefill && $obj->prefill = $prefill;

        return $obj;
    }

    /**
     * The id of the data session.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The Epoch time in seconds at which the Session was created.
     */
    public function withCreatedAt(float $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Whether customers can choose another bank than the pre-selected one.
     */
    public function withDisableBankSelection(bool $disableBankSelection): self
    {
        $obj = clone $this;
        $obj->disableBankSelection = $disableBankSelection;

        return $obj;
    }

    /**
     * Currently only visible in the merchant dashboard. This id used to be displayed to the user during the checkout.
     */
    public function withDisplayID(string $displayID): self
    {
        $obj = clone $this;
        $obj->displayID = $displayID;

        return $obj;
    }

    /**
     * The URL where users will be redirected after an unsuccessful session.
     */
    public function withErrorCallbackURL(string $errorCallbackURL): self
    {
        $obj = clone $this;
        $obj->errorCallbackURL = $errorCallbackURL;

        return $obj;
    }

    /**
     * The Epoch time in seconds at which the Session will expire.
     */
    public function withExpiresAt(float $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }

    /**
     * The id of the merchant.
     */
    public function withMerchantID(string $merchantID): self
    {
        $obj = clone $this;
        $obj->merchantID = $merchantID;

        return $obj;
    }

    /**
     * An internal reference id for the data session.
     */
    public function withReferenceID(string $referenceID): self
    {
        $obj = clone $this;
        $obj->referenceID = $referenceID;

        return $obj;
    }

    /**
     * The status of the data session.
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
     * The URL where users will be redirected after a successful session.
     */
    public function withSuccessCallbackURL(string $successCallbackURL): self
    {
        $obj = clone $this;
        $obj->successCallbackURL = $successCallbackURL;

        return $obj;
    }

    /**
     * The Epoch time in seconds at which the Session was updated.
     */
    public function withUpdatedAt(float $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * The locale of the data session.
     *
     * @param Locale::* $locale
     */
    public function withLocale(string $locale): self
    {
        $obj = clone $this;
        $obj->locale = $locale;

        return $obj;
    }

    /**
     * ISO 3166-1 alpha-2 country code of the market.
     *
     * @param Market::* $market
     */
    public function withMarket(string $market): self
    {
        $obj = clone $this;
        $obj->market = $market;

        return $obj;
    }

    /**
     * Any data stored with this data session.
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
     * Prefill options for the data session.
     */
    public function withPrefill(Prefill $prefill): self
    {
        $obj = clone $this;
        $obj->prefill = $prefill;

        return $obj;
    }
}
