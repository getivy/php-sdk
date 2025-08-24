<?php

declare(strict_types=1);

namespace Getivy\Responses\Checkoutsession;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Checkoutsession\CheckoutsessionExpireResponse\AvailableMarket;
use Getivy\Responses\Checkoutsession\CheckoutsessionExpireResponse\BillingAddress;
use Getivy\Responses\Checkoutsession\CheckoutsessionExpireResponse\Customer;
use Getivy\Responses\Checkoutsession\CheckoutsessionExpireResponse\LineItem;
use Getivy\Responses\Checkoutsession\CheckoutsessionExpireResponse\Locale;
use Getivy\Responses\Checkoutsession\CheckoutsessionExpireResponse\Mandate;
use Getivy\Responses\Checkoutsession\CheckoutsessionExpireResponse\Market;
use Getivy\Responses\Checkoutsession\CheckoutsessionExpireResponse\Merchant;
use Getivy\Responses\Checkoutsession\CheckoutsessionExpireResponse\PaymentMode;
use Getivy\Responses\Checkoutsession\CheckoutsessionExpireResponse\PaymentSchemeSelection;
use Getivy\Responses\Checkoutsession\CheckoutsessionExpireResponse\Price;
use Getivy\Responses\Checkoutsession\CheckoutsessionExpireResponse\Required;
use Getivy\Responses\Checkoutsession\CheckoutsessionExpireResponse\ShippingAddress;
use Getivy\Responses\Checkoutsession\CheckoutsessionExpireResponse\Status;

final class CheckoutsessionExpireResponse implements BaseModel
{
    use SdkModel;

    #[Api]
    public string $id;

    #[Api('appId')]
    public string $appID;

    #[Api]
    public float $created;

    #[Api('displayId')]
    public string $displayID;

    #[Api('errorCallbackUrl')]
    public string $errorCallbackURL;

    #[Api]
    public float $expiresAt;

    /** @var list<LineItem> $lineItems */
    #[Api(list: LineItem::class)]
    public array $lineItems;

    #[Api]
    public Merchant $merchant;

    #[Api('merchantAppId')]
    public string $merchantAppID;

    #[Api]
    public Price $price;

    #[Api('redirectUrl')]
    public string $redirectURL;

    #[Api('referenceId')]
    public string $referenceID;

    /** @var Status::* $status */
    #[Api(enum: Status::class)]
    public string $status;

    #[Api('successCallbackUrl')]
    public string $successCallbackURL;

    #[Api(optional: true)]
    public ?string $abortReason;

    /** @var list<AvailableMarket::*>|null $availableMarkets */
    #[Api(list: AvailableMarket::class, optional: true)]
    public ?array $availableMarkets;

    #[Api(optional: true)]
    public ?BillingAddress $billingAddress;

    #[Api(optional: true)]
    public ?string $category;

    #[Api('completeCallbackUrl', optional: true)]
    public ?string $completeCallbackURL;

    #[Api(optional: true)]
    public mixed $createdAt;

    #[Api(optional: true)]
    public ?Customer $customer;

    #[Api(optional: true)]
    public ?bool $disableBankSelection;

    #[Api(optional: true)]
    public ?bool $express;

    #[Api(optional: true)]
    public ?bool $guest;

    #[Api(optional: true)]
    public ?bool $handshake;

    /** @var list<string>|null $impactOffsetProjects */
    #[Api(list: 'string', optional: true)]
    public ?array $impactOffsetProjects;

    #[Api(optional: true)]
    public ?string $incentiveMode;

    /** @var Locale::*|null $locale */
    #[Api(enum: Locale::class, optional: true)]
    public ?string $locale;

    #[Api(optional: true)]
    public ?Mandate $mandate;

    /** @var Market::*|null $market */
    #[Api(enum: Market::class, optional: true)]
    public ?string $market;

    /** @var array<string, mixed>|null $metadata */
    #[Api(map: 'mixed', optional: true)]
    public ?array $metadata;

    #[Api(optional: true)]
    public ?string $offsetProject;

    /** @var PaymentMode::*|null $paymentMode */
    #[Api(enum: PaymentMode::class, optional: true)]
    public ?string $paymentMode;

    /** @var PaymentSchemeSelection::*|null $paymentSchemeSelection */
    #[Api(enum: PaymentSchemeSelection::class, optional: true)]
    public ?string $paymentSchemeSelection;

    #[Api(optional: true)]
    public ?string $plugin;

    #[Api(optional: true)]
    public mixed $prefill;

    #[Api('quoteCallbackUrl', optional: true)]
    public ?string $quoteCallbackURL;

    #[Api(optional: true)]
    public ?Required $required;

    #[Api('selectedShippingMethodId', optional: true)]
    public ?string $selectedShippingMethodID;

    #[Api(optional: true)]
    public ?ShippingAddress $shippingAddress;

    /** @var list<mixed>|null $shippingMethods */
    #[Api(list: 'mixed', optional: true)]
    public ?array $shippingMethods;

    #[Api(optional: true)]
    public ?string $shopLogo;

    #[Api(optional: true)]
    public ?string $shopName;

    #[Api('subaccountId', optional: true)]
    public ?string $subaccountID;

    #[Api(optional: true)]
    public mixed $updatedAt;

    /**
     * `new CheckoutsessionExpireResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CheckoutsessionExpireResponse::with(
     *   id: ...,
     *   appID: ...,
     *   created: ...,
     *   displayID: ...,
     *   errorCallbackURL: ...,
     *   expiresAt: ...,
     *   lineItems: ...,
     *   merchant: ...,
     *   merchantAppID: ...,
     *   price: ...,
     *   redirectURL: ...,
     *   referenceID: ...,
     *   status: ...,
     *   successCallbackURL: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CheckoutsessionExpireResponse)
     *   ->withID(...)
     *   ->withAppID(...)
     *   ->withCreated(...)
     *   ->withDisplayID(...)
     *   ->withErrorCallbackURL(...)
     *   ->withExpiresAt(...)
     *   ->withLineItems(...)
     *   ->withMerchant(...)
     *   ->withMerchantAppID(...)
     *   ->withPrice(...)
     *   ->withRedirectURL(...)
     *   ->withReferenceID(...)
     *   ->withStatus(...)
     *   ->withSuccessCallbackURL(...)
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
     * @param list<LineItem> $lineItems
     * @param Status::* $status
     * @param list<AvailableMarket::*> $availableMarkets
     * @param list<string> $impactOffsetProjects
     * @param Locale::* $locale
     * @param Market::* $market
     * @param array<string, mixed> $metadata
     * @param PaymentMode::* $paymentMode
     * @param PaymentSchemeSelection::* $paymentSchemeSelection
     * @param list<mixed> $shippingMethods
     */
    public static function with(
        string $id,
        string $appID,
        float $created,
        string $displayID,
        string $errorCallbackURL,
        float $expiresAt,
        array $lineItems,
        Merchant $merchant,
        string $merchantAppID,
        Price $price,
        string $redirectURL,
        string $referenceID,
        string $status,
        string $successCallbackURL,
        ?string $abortReason = null,
        ?array $availableMarkets = null,
        ?BillingAddress $billingAddress = null,
        ?string $category = null,
        ?string $completeCallbackURL = null,
        mixed $createdAt = null,
        ?Customer $customer = null,
        ?bool $disableBankSelection = null,
        ?bool $express = null,
        ?bool $guest = null,
        ?bool $handshake = null,
        ?array $impactOffsetProjects = null,
        ?string $incentiveMode = null,
        ?string $locale = null,
        ?Mandate $mandate = null,
        ?string $market = null,
        ?array $metadata = null,
        ?string $offsetProject = null,
        ?string $paymentMode = null,
        ?string $paymentSchemeSelection = null,
        ?string $plugin = null,
        mixed $prefill = null,
        ?string $quoteCallbackURL = null,
        ?Required $required = null,
        ?string $selectedShippingMethodID = null,
        ?ShippingAddress $shippingAddress = null,
        ?array $shippingMethods = null,
        ?string $shopLogo = null,
        ?string $shopName = null,
        ?string $subaccountID = null,
        mixed $updatedAt = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->appID = $appID;
        $obj->created = $created;
        $obj->displayID = $displayID;
        $obj->errorCallbackURL = $errorCallbackURL;
        $obj->expiresAt = $expiresAt;
        $obj->lineItems = $lineItems;
        $obj->merchant = $merchant;
        $obj->merchantAppID = $merchantAppID;
        $obj->price = $price;
        $obj->redirectURL = $redirectURL;
        $obj->referenceID = $referenceID;
        $obj->status = $status;
        $obj->successCallbackURL = $successCallbackURL;

        null !== $abortReason && $obj->abortReason = $abortReason;
        null !== $availableMarkets && $obj->availableMarkets = $availableMarkets;
        null !== $billingAddress && $obj->billingAddress = $billingAddress;
        null !== $category && $obj->category = $category;
        null !== $completeCallbackURL && $obj->completeCallbackURL = $completeCallbackURL;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $customer && $obj->customer = $customer;
        null !== $disableBankSelection && $obj->disableBankSelection = $disableBankSelection;
        null !== $express && $obj->express = $express;
        null !== $guest && $obj->guest = $guest;
        null !== $handshake && $obj->handshake = $handshake;
        null !== $impactOffsetProjects && $obj->impactOffsetProjects = $impactOffsetProjects;
        null !== $incentiveMode && $obj->incentiveMode = $incentiveMode;
        null !== $locale && $obj->locale = $locale;
        null !== $mandate && $obj->mandate = $mandate;
        null !== $market && $obj->market = $market;
        null !== $metadata && $obj->metadata = $metadata;
        null !== $offsetProject && $obj->offsetProject = $offsetProject;
        null !== $paymentMode && $obj->paymentMode = $paymentMode;
        null !== $paymentSchemeSelection && $obj->paymentSchemeSelection = $paymentSchemeSelection;
        null !== $plugin && $obj->plugin = $plugin;
        null !== $prefill && $obj->prefill = $prefill;
        null !== $quoteCallbackURL && $obj->quoteCallbackURL = $quoteCallbackURL;
        null !== $required && $obj->required = $required;
        null !== $selectedShippingMethodID && $obj->selectedShippingMethodID = $selectedShippingMethodID;
        null !== $shippingAddress && $obj->shippingAddress = $shippingAddress;
        null !== $shippingMethods && $obj->shippingMethods = $shippingMethods;
        null !== $shopLogo && $obj->shopLogo = $shopLogo;
        null !== $shopName && $obj->shopName = $shopName;
        null !== $subaccountID && $obj->subaccountID = $subaccountID;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withAppID(string $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    public function withCreated(float $created): self
    {
        $obj = clone $this;
        $obj->created = $created;

        return $obj;
    }

    public function withDisplayID(string $displayID): self
    {
        $obj = clone $this;
        $obj->displayID = $displayID;

        return $obj;
    }

    public function withErrorCallbackURL(string $errorCallbackURL): self
    {
        $obj = clone $this;
        $obj->errorCallbackURL = $errorCallbackURL;

        return $obj;
    }

    public function withExpiresAt(float $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }

    /**
     * @param list<LineItem> $lineItems
     */
    public function withLineItems(array $lineItems): self
    {
        $obj = clone $this;
        $obj->lineItems = $lineItems;

        return $obj;
    }

    public function withMerchant(Merchant $merchant): self
    {
        $obj = clone $this;
        $obj->merchant = $merchant;

        return $obj;
    }

    public function withMerchantAppID(string $merchantAppID): self
    {
        $obj = clone $this;
        $obj->merchantAppID = $merchantAppID;

        return $obj;
    }

    public function withPrice(Price $price): self
    {
        $obj = clone $this;
        $obj->price = $price;

        return $obj;
    }

    public function withRedirectURL(string $redirectURL): self
    {
        $obj = clone $this;
        $obj->redirectURL = $redirectURL;

        return $obj;
    }

    public function withReferenceID(string $referenceID): self
    {
        $obj = clone $this;
        $obj->referenceID = $referenceID;

        return $obj;
    }

    /**
     * @param Status::* $status
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    public function withSuccessCallbackURL(string $successCallbackURL): self
    {
        $obj = clone $this;
        $obj->successCallbackURL = $successCallbackURL;

        return $obj;
    }

    public function withAbortReason(string $abortReason): self
    {
        $obj = clone $this;
        $obj->abortReason = $abortReason;

        return $obj;
    }

    /**
     * @param list<AvailableMarket::*> $availableMarkets
     */
    public function withAvailableMarkets(array $availableMarkets): self
    {
        $obj = clone $this;
        $obj->availableMarkets = $availableMarkets;

        return $obj;
    }

    public function withBillingAddress(BillingAddress $billingAddress): self
    {
        $obj = clone $this;
        $obj->billingAddress = $billingAddress;

        return $obj;
    }

    public function withCategory(string $category): self
    {
        $obj = clone $this;
        $obj->category = $category;

        return $obj;
    }

    public function withCompleteCallbackURL(string $completeCallbackURL): self
    {
        $obj = clone $this;
        $obj->completeCallbackURL = $completeCallbackURL;

        return $obj;
    }

    public function withCreatedAt(mixed $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withCustomer(Customer $customer): self
    {
        $obj = clone $this;
        $obj->customer = $customer;

        return $obj;
    }

    public function withDisableBankSelection(bool $disableBankSelection): self
    {
        $obj = clone $this;
        $obj->disableBankSelection = $disableBankSelection;

        return $obj;
    }

    public function withExpress(bool $express): self
    {
        $obj = clone $this;
        $obj->express = $express;

        return $obj;
    }

    public function withGuest(bool $guest): self
    {
        $obj = clone $this;
        $obj->guest = $guest;

        return $obj;
    }

    public function withHandshake(bool $handshake): self
    {
        $obj = clone $this;
        $obj->handshake = $handshake;

        return $obj;
    }

    /**
     * @param list<string> $impactOffsetProjects
     */
    public function withImpactOffsetProjects(array $impactOffsetProjects): self
    {
        $obj = clone $this;
        $obj->impactOffsetProjects = $impactOffsetProjects;

        return $obj;
    }

    public function withIncentiveMode(string $incentiveMode): self
    {
        $obj = clone $this;
        $obj->incentiveMode = $incentiveMode;

        return $obj;
    }

    /**
     * @param Locale::* $locale
     */
    public function withLocale(string $locale): self
    {
        $obj = clone $this;
        $obj->locale = $locale;

        return $obj;
    }

    public function withMandate(Mandate $mandate): self
    {
        $obj = clone $this;
        $obj->mandate = $mandate;

        return $obj;
    }

    /**
     * @param Market::* $market
     */
    public function withMarket(string $market): self
    {
        $obj = clone $this;
        $obj->market = $market;

        return $obj;
    }

    /**
     * @param array<string, mixed> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }

    public function withOffsetProject(string $offsetProject): self
    {
        $obj = clone $this;
        $obj->offsetProject = $offsetProject;

        return $obj;
    }

    /**
     * @param PaymentMode::* $paymentMode
     */
    public function withPaymentMode(string $paymentMode): self
    {
        $obj = clone $this;
        $obj->paymentMode = $paymentMode;

        return $obj;
    }

    /**
     * @param PaymentSchemeSelection::* $paymentSchemeSelection
     */
    public function withPaymentSchemeSelection(
        string $paymentSchemeSelection
    ): self {
        $obj = clone $this;
        $obj->paymentSchemeSelection = $paymentSchemeSelection;

        return $obj;
    }

    public function withPlugin(string $plugin): self
    {
        $obj = clone $this;
        $obj->plugin = $plugin;

        return $obj;
    }

    public function withPrefill(mixed $prefill): self
    {
        $obj = clone $this;
        $obj->prefill = $prefill;

        return $obj;
    }

    public function withQuoteCallbackURL(string $quoteCallbackURL): self
    {
        $obj = clone $this;
        $obj->quoteCallbackURL = $quoteCallbackURL;

        return $obj;
    }

    public function withRequired(Required $required): self
    {
        $obj = clone $this;
        $obj->required = $required;

        return $obj;
    }

    public function withSelectedShippingMethodID(
        string $selectedShippingMethodID
    ): self {
        $obj = clone $this;
        $obj->selectedShippingMethodID = $selectedShippingMethodID;

        return $obj;
    }

    public function withShippingAddress(ShippingAddress $shippingAddress): self
    {
        $obj = clone $this;
        $obj->shippingAddress = $shippingAddress;

        return $obj;
    }

    /**
     * @param list<mixed> $shippingMethods
     */
    public function withShippingMethods(array $shippingMethods): self
    {
        $obj = clone $this;
        $obj->shippingMethods = $shippingMethods;

        return $obj;
    }

    public function withShopLogo(string $shopLogo): self
    {
        $obj = clone $this;
        $obj->shopLogo = $shopLogo;

        return $obj;
    }

    public function withShopName(string $shopName): self
    {
        $obj = clone $this;
        $obj->shopName = $shopName;

        return $obj;
    }

    public function withSubaccountID(string $subaccountID): self
    {
        $obj = clone $this;
        $obj->subaccountID = $subaccountID;

        return $obj;
    }

    public function withUpdatedAt(mixed $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
