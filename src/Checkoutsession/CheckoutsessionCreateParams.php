<?php

declare(strict_types=1);

namespace Getivy\Checkoutsession;

use Getivy\Checkoutsession\CheckoutsessionCreateParams\BillingAddress;
use Getivy\Checkoutsession\CheckoutsessionCreateParams\Customer;
use Getivy\Checkoutsession\CheckoutsessionCreateParams\LineItem;
use Getivy\Checkoutsession\CheckoutsessionCreateParams\Locale;
use Getivy\Checkoutsession\CheckoutsessionCreateParams\Mandate;
use Getivy\Checkoutsession\CheckoutsessionCreateParams\Market;
use Getivy\Checkoutsession\CheckoutsessionCreateParams\PaymentMode;
use Getivy\Checkoutsession\CheckoutsessionCreateParams\PaymentSchemeSelection;
use Getivy\Checkoutsession\CheckoutsessionCreateParams\Prefill;
use Getivy\Checkoutsession\CheckoutsessionCreateParams\Price;
use Getivy\Checkoutsession\CheckoutsessionCreateParams\SettlementDestination;
use Getivy\Checkoutsession\CheckoutsessionCreateParams\ThemeVariant;
use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Core\Conversion\ListOf;
use Getivy\Core\Conversion\MapOf;

/**
 * Creates a Checkout Session for the merchant corresponding to the given API key. See [the guide](https://docs.getivy.de/docs/payment-integration) for more information.
 */
final class CheckoutsessionCreateParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * Price of the checkout session.
     */
    #[Api]
    public Price $price;

    /**
     * An internal reference id which will be stored with the order. Needs to be unique per shop and can be up to 200 characters.
     */
    #[Api('referenceId')]
    public string $referenceID;

    /**
     * The billing address of the customer.
     */
    #[Api(optional: true)]
    public ?BillingAddress $billingAddress;

    /**
     * Complete Callback requests will be sent to this URL on default.
     */
    #[Api('completeCallbackUrl', optional: true)]
    public ?string $completeCallbackURL;

    /**
     * The Epoch time in seconds at which the Checkout Session was created. By default, time of api CheckoutSession creation at Ivy.
     */
    #[Api(optional: true)]
    public ?float $created;

    #[Api(optional: true)]
    public ?Customer $customer;

    /**
     * Disable bank selection mode. If set to true, customers cannot modify the pre selected bank.
     */
    #[Api(optional: true)]
    public ?bool $disableBankSelection;

    /**
     * The order id which will be displayed to the user and in the merchant dashboard. At most 200 characters are allowed.
     */
    #[Api('displayId', optional: true)]
    public ?string $displayID;

    /**
     * Users will be redirected here on default after an unsuccessful checkout.
     */
    #[Api('errorCallbackUrl', optional: true)]
    public ?string $errorCallbackURL;

    /**
     * The Epoch time in seconds at which the Checkout Session will expire. It can be anywhere from 30 minutes to 24 hours after Checkout Session creation. By default, this value is 1 hour from creation.
     */
    #[Api(optional: true)]
    public ?float $expiresAt;

    /**
     * Sets the checkout to a express version.
     */
    #[Api(optional: true)]
    public ?bool $express;

    /**
     * All line items of this checkout session. At least one line item required.
     *
     * @var list<LineItem>|null $lineItems
     */
    #[Api(type: new ListOf(LineItem::class), optional: true)]
    public ?array $lineItems;

    /** @var Locale::*|null $locale */
    #[Api(enum: Locale::class, optional: true)]
    public ?string $locale;

    #[Api(optional: true)]
    public ?Mandate $mandate;

    /**
     * The market of the checkoutSession. Will show the market banks connected with this market.
     *
     * @var Market::*|null $market
     */
    #[Api(enum: Market::class, optional: true)]
    public ?string $market;

    /**
     * Any data which will be stored and returned for this checkout session and corresponding order.
     *
     * @var array<string, mixed>|null $metadata
     */
    #[Api(type: new MapOf('string'), optional: true)]
    public ?array $metadata;

    /**
     * The mode in which the payment should be processed. If direct is used, you need to provide a settlementDestination.
     *
     * @var PaymentMode::*|null $paymentMode
     */
    #[Api(enum: PaymentMode::class, optional: true)]
    public ?string $paymentMode;

    /** @var PaymentSchemeSelection::*|null $paymentSchemeSelection */
    #[Api(enum: PaymentSchemeSelection::class, optional: true)]
    public ?string $paymentSchemeSelection;

    /**
     * The values specified here will be pre-filled in the Ivy Checkout.
     */
    #[Api(optional: true)]
    public ?Prefill $prefill;

    /**
     * Quote Callback requests will be sent to this URL on default.
     */
    #[Api('quoteCallbackUrl', optional: true)]
    public ?string $quoteCallbackURL;

    #[Api(optional: true)]
    public ?SettlementDestination $settlementDestination;

    #[Api('subaccountId', optional: true)]
    public ?string $subaccountID;

    /**
     * Users will be redirected here on default after a successful checkout.
     */
    #[Api('successCallbackUrl', optional: true)]
    public ?string $successCallbackURL;

    /** @var ThemeVariant::*|null $themeVariant */
    #[Api(enum: ThemeVariant::class, optional: true)]
    public ?string $themeVariant;

    /**
     * `new CheckoutsessionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CheckoutsessionCreateParams::with(price: ..., referenceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CheckoutsessionCreateParams)->withPrice(...)->withReferenceID(...)
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
     * @param list<LineItem>|null $lineItems
     * @param Locale::*|null $locale
     * @param Market::*|null $market
     * @param array<string, mixed>|null $metadata
     * @param PaymentMode::*|null $paymentMode
     * @param PaymentSchemeSelection::*|null $paymentSchemeSelection
     * @param ThemeVariant::*|null $themeVariant
     */
    public static function with(
        Price $price,
        string $referenceID,
        ?BillingAddress $billingAddress = null,
        ?string $completeCallbackURL = null,
        ?float $created = null,
        ?Customer $customer = null,
        ?bool $disableBankSelection = null,
        ?string $displayID = null,
        ?string $errorCallbackURL = null,
        ?float $expiresAt = null,
        ?bool $express = null,
        ?array $lineItems = null,
        ?string $locale = null,
        ?Mandate $mandate = null,
        ?string $market = null,
        ?array $metadata = null,
        ?string $paymentMode = null,
        ?string $paymentSchemeSelection = null,
        ?Prefill $prefill = null,
        ?string $quoteCallbackURL = null,
        ?SettlementDestination $settlementDestination = null,
        ?string $subaccountID = null,
        ?string $successCallbackURL = null,
        ?string $themeVariant = null,
    ): self {
        $obj = new self;

        $obj->price = $price;
        $obj->referenceID = $referenceID;

        null !== $billingAddress && $obj->billingAddress = $billingAddress;
        null !== $completeCallbackURL && $obj->completeCallbackURL = $completeCallbackURL;
        null !== $created && $obj->created = $created;
        null !== $customer && $obj->customer = $customer;
        null !== $disableBankSelection && $obj->disableBankSelection = $disableBankSelection;
        null !== $displayID && $obj->displayID = $displayID;
        null !== $errorCallbackURL && $obj->errorCallbackURL = $errorCallbackURL;
        null !== $expiresAt && $obj->expiresAt = $expiresAt;
        null !== $express && $obj->express = $express;
        null !== $lineItems && $obj->lineItems = $lineItems;
        null !== $locale && $obj->locale = $locale;
        null !== $mandate && $obj->mandate = $mandate;
        null !== $market && $obj->market = $market;
        null !== $metadata && $obj->metadata = $metadata;
        null !== $paymentMode && $obj->paymentMode = $paymentMode;
        null !== $paymentSchemeSelection && $obj->paymentSchemeSelection = $paymentSchemeSelection;
        null !== $prefill && $obj->prefill = $prefill;
        null !== $quoteCallbackURL && $obj->quoteCallbackURL = $quoteCallbackURL;
        null !== $settlementDestination && $obj->settlementDestination = $settlementDestination;
        null !== $subaccountID && $obj->subaccountID = $subaccountID;
        null !== $successCallbackURL && $obj->successCallbackURL = $successCallbackURL;
        null !== $themeVariant && $obj->themeVariant = $themeVariant;

        return $obj;
    }

    /**
     * Price of the checkout session.
     */
    public function withPrice(Price $price): self
    {
        $obj = clone $this;
        $obj->price = $price;

        return $obj;
    }

    /**
     * An internal reference id which will be stored with the order. Needs to be unique per shop and can be up to 200 characters.
     */
    public function withReferenceID(string $referenceID): self
    {
        $obj = clone $this;
        $obj->referenceID = $referenceID;

        return $obj;
    }

    /**
     * The billing address of the customer.
     */
    public function withBillingAddress(BillingAddress $billingAddress): self
    {
        $obj = clone $this;
        $obj->billingAddress = $billingAddress;

        return $obj;
    }

    /**
     * Complete Callback requests will be sent to this URL on default.
     */
    public function withCompleteCallbackURL(string $completeCallbackURL): self
    {
        $obj = clone $this;
        $obj->completeCallbackURL = $completeCallbackURL;

        return $obj;
    }

    /**
     * The Epoch time in seconds at which the Checkout Session was created. By default, time of api CheckoutSession creation at Ivy.
     */
    public function withCreated(float $created): self
    {
        $obj = clone $this;
        $obj->created = $created;

        return $obj;
    }

    public function withCustomer(Customer $customer): self
    {
        $obj = clone $this;
        $obj->customer = $customer;

        return $obj;
    }

    /**
     * Disable bank selection mode. If set to true, customers cannot modify the pre selected bank.
     */
    public function withDisableBankSelection(bool $disableBankSelection): self
    {
        $obj = clone $this;
        $obj->disableBankSelection = $disableBankSelection;

        return $obj;
    }

    /**
     * The order id which will be displayed to the user and in the merchant dashboard. At most 200 characters are allowed.
     */
    public function withDisplayID(string $displayID): self
    {
        $obj = clone $this;
        $obj->displayID = $displayID;

        return $obj;
    }

    /**
     * Users will be redirected here on default after an unsuccessful checkout.
     */
    public function withErrorCallbackURL(string $errorCallbackURL): self
    {
        $obj = clone $this;
        $obj->errorCallbackURL = $errorCallbackURL;

        return $obj;
    }

    /**
     * The Epoch time in seconds at which the Checkout Session will expire. It can be anywhere from 30 minutes to 24 hours after Checkout Session creation. By default, this value is 1 hour from creation.
     */
    public function withExpiresAt(float $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }

    /**
     * Sets the checkout to a express version.
     */
    public function withExpress(bool $express): self
    {
        $obj = clone $this;
        $obj->express = $express;

        return $obj;
    }

    /**
     * All line items of this checkout session. At least one line item required.
     *
     * @param list<LineItem> $lineItems
     */
    public function withLineItems(array $lineItems): self
    {
        $obj = clone $this;
        $obj->lineItems = $lineItems;

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
     * The market of the checkoutSession. Will show the market banks connected with this market.
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
     * Any data which will be stored and returned for this checkout session and corresponding order.
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
     * The mode in which the payment should be processed. If direct is used, you need to provide a settlementDestination.
     *
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

    /**
     * The values specified here will be pre-filled in the Ivy Checkout.
     */
    public function withPrefill(Prefill $prefill): self
    {
        $obj = clone $this;
        $obj->prefill = $prefill;

        return $obj;
    }

    /**
     * Quote Callback requests will be sent to this URL on default.
     */
    public function withQuoteCallbackURL(string $quoteCallbackURL): self
    {
        $obj = clone $this;
        $obj->quoteCallbackURL = $quoteCallbackURL;

        return $obj;
    }

    public function withSettlementDestination(
        SettlementDestination $settlementDestination
    ): self {
        $obj = clone $this;
        $obj->settlementDestination = $settlementDestination;

        return $obj;
    }

    public function withSubaccountID(string $subaccountID): self
    {
        $obj = clone $this;
        $obj->subaccountID = $subaccountID;

        return $obj;
    }

    /**
     * Users will be redirected here on default after a successful checkout.
     */
    public function withSuccessCallbackURL(string $successCallbackURL): self
    {
        $obj = clone $this;
        $obj->successCallbackURL = $successCallbackURL;

        return $obj;
    }

    /**
     * @param ThemeVariant::* $themeVariant
     */
    public function withThemeVariant(string $themeVariant): self
    {
        $obj = clone $this;
        $obj->themeVariant = $themeVariant;

        return $obj;
    }
}
