<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Core\Conversion\ListOf;
use Getivy\Core\Conversion\MapOf;
use Getivy\Responses\Orders\OrderGetResponse\BillingAddress;
use Getivy\Responses\Orders\OrderGetResponse\ClimateActionMode;
use Getivy\Responses\Orders\OrderGetResponse\Destination;
use Getivy\Responses\Orders\OrderGetResponse\LineItem;
use Getivy\Responses\Orders\OrderGetResponse\Mandate;
use Getivy\Responses\Orders\OrderGetResponse\MerchantFinancialAddress;
use Getivy\Responses\Orders\OrderGetResponse\PayerFinancialAddress;
use Getivy\Responses\Orders\OrderGetResponse\PaymentMethodType;
use Getivy\Responses\Orders\OrderGetResponse\PaymentMode;
use Getivy\Responses\Orders\OrderGetResponse\PaymentStatus;
use Getivy\Responses\Orders\OrderGetResponse\Price;
use Getivy\Responses\Orders\OrderGetResponse\Refund;
use Getivy\Responses\Orders\OrderGetResponse\ShippingAddress;
use Getivy\Responses\Orders\OrderGetResponse\Shopper;
use Getivy\Responses\Orders\OrderGetResponse\Status;
use Getivy\Responses\Orders\OrderGetResponse\StatusClassification;
use Getivy\Responses\Orders\OrderGetResponse\StatusHistoryList;

final class OrderGetResponse implements BaseModel
{
    use SdkModel;

    /**
     * The unique id for the order.
     */
    #[Api]
    public string $id;

    /**
     * The unique id for the merchantApp which initiated the order.
     */
    #[Api('appId')]
    public string $appID;

    /**
     * The amount of application fee collected with the order.
     */
    #[Api]
    public float $applicationFeeAmount;

    #[Api]
    public mixed $createdAt;

    #[Api]
    public bool $instantPaymentScheme;

    /**
     * Same as appId.
     */
    #[Api('merchantAppId')]
    public string $merchantAppID;

    #[Api('merchantId')]
    public string $merchantID;

    /**
     * The price object. All values in decimals, e.g. 0.13 for 13 cents.
     */
    #[Api]
    public Price $price;

    /**
     * A unique id for the order which can be set when creating the checkoutSession.
     */
    #[Api('referenceId')]
    public string $referenceID;

    /**
     * The legal name of the merchant which initiated the order.
     */
    #[Api]
    public string $shopName;

    /**
     * The status of the order. As soon as this value is 'paid', you can ship the order.
     *
     * @var Status::* $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    #[Api]
    public mixed $updatedAt;

    /**
     * The unique identifier of the customer's bank.
     */
    #[Api('bankId', optional: true)]
    public ?string $bankID;

    /**
     * The reference that will be shown on the bank statement of the customer. Only available after a successful DirectDebit initiation.
     */
    #[Api(optional: true)]
    public ?string $bankStatementReference;

    #[Api(optional: true)]
    public ?BillingAddress $billingAddress;

    /**
     * The merchant category code for the account. MCCs are used to classify businesses based on the goods or services they provide.
     */
    #[Api(optional: true)]
    public ?string $category;

    #[Api(optional: true)]
    public ?ClimateActionMode $climateActionMode;

    #[Api(optional: true)]
    public ?float $co2Grams;

    /**
     * The unique identifier of the customer who placed the order.
     */
    #[Api('customerId', optional: true)]
    public ?string $customerID;

    /**
     * The destination bank account and statement reference for the order.
     */
    #[Api(optional: true)]
    public ?Destination $destination;

    /**
     * The customer-facing id of the order.
     */
    #[Api('displayId', optional: true)]
    public ?string $displayID;

    #[Api(optional: true)]
    public ?bool $guest;

    /** @var list<mixed>|null $impactOffsetProjects */
    #[Api(type: new ListOf('mixed'), optional: true)]
    public ?array $impactOffsetProjects;

    /**
     * The list of line items sold with the order.
     *
     * @var list<LineItem>|null $lineItems
     */
    #[Api(type: new ListOf(LineItem::class), optional: true)]
    public ?array $lineItems;

    #[Api(optional: true)]
    public ?Mandate $mandate;

    /**
     * The financial address of the merchant associated with the order. Only available when requested via order/details and therefore requires authentication.
     */
    #[Api(optional: true)]
    public ?MerchantFinancialAddress $merchantFinancialAddress;

    /**
     * Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
     *
     * @var array<string, mixed>|null $metadata
     */
    #[Api(type: new MapOf('string'), optional: true)]
    public ?array $metadata;

    /**
     * The project related to the order.
     */
    #[Api(optional: true)]
    public ?string $offsetProject;

    /**
     * The financial address of the payer associated with the order. Only available after successful PIS flow.
     */
    #[Api(optional: true)]
    public ?PayerFinancialAddress $payerFinancialAddress;

    /** @var PaymentMethodType::*|null $paymentMethodType */
    #[Api(enum: PaymentMethodType::class, optional: true)]
    public ?string $paymentMethodType;

    /**
     * The payment mode of the order. Can be either settlement or direct.
     *
     * @var PaymentMode::*|null $paymentMode
     */
    #[Api(enum: PaymentMode::class, optional: true)]
    public ?string $paymentMode;

    /**
     * Deprecated. The status of the payment.
     *
     * @var PaymentStatus::*|null $paymentStatus
     */
    #[Api(enum: PaymentStatus::class, optional: true)]
    public ?string $paymentStatus;

    /**
     * The total amount in the currency of all successful refunds for this order.
     */
    #[Api(optional: true)]
    public ?float $refundAmount;

    /**
     * All partial and total refunds of this order.
     *
     * @var list<Refund>|null $refunds
     */
    #[Api(type: new ListOf(Refund::class), optional: true)]
    public ?array $refunds;

    /**
     * If set to true, a payment mandate will be created for the user. This is currently in alpha and defaults to false.
     */
    #[Api(optional: true)]
    public ?bool $setupPaymentMandate;

    #[Api(optional: true)]
    public ?ShippingAddress $shippingAddress;

    #[Api(optional: true)]
    public ?string $shopLogo;

    /**
     * Information about the customer who finished the order.
     */
    #[Api(optional: true)]
    public ?Shopper $shopper;

    /**
     * Deprecated. The email of the customer who completed the order.
     */
    #[Api(optional: true)]
    public ?string $shopperEmail;

    #[Api(optional: true)]
    public ?StatusClassification $statusClassification;

    /** @var list<StatusHistoryList>|null $statusHistoryList */
    #[Api(type: new ListOf(StatusHistoryList::class), optional: true)]
    public ?array $statusHistoryList;

    /**
     * The subaccount id of the merchant.
     */
    #[Api('subaccountId', optional: true)]
    public ?string $subaccountID;

    #[Api(optional: true)]
    public ?string $subaccountLegalName;

    #[Api(optional: true)]
    public ?float $trees;

    /**
     * `new OrderGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OrderGetResponse::with(
     *   id: ...,
     *   appID: ...,
     *   applicationFeeAmount: ...,
     *   createdAt: ...,
     *   instantPaymentScheme: ...,
     *   merchantAppID: ...,
     *   merchantID: ...,
     *   price: ...,
     *   referenceID: ...,
     *   shopName: ...,
     *   status: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OrderGetResponse)
     *   ->withID(...)
     *   ->withAppID(...)
     *   ->withApplicationFeeAmount(...)
     *   ->withCreatedAt(...)
     *   ->withInstantPaymentScheme(...)
     *   ->withMerchantAppID(...)
     *   ->withMerchantID(...)
     *   ->withPrice(...)
     *   ->withReferenceID(...)
     *   ->withShopName(...)
     *   ->withStatus(...)
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
     * @param list<mixed>|null $impactOffsetProjects
     * @param list<LineItem>|null $lineItems
     * @param array<string, mixed>|null $metadata
     * @param PaymentMethodType::*|null $paymentMethodType
     * @param PaymentMode::*|null $paymentMode
     * @param PaymentStatus::*|null $paymentStatus
     * @param list<Refund>|null $refunds
     * @param list<StatusHistoryList>|null $statusHistoryList
     */
    public static function with(
        string $id,
        string $appID,
        float $applicationFeeAmount,
        mixed $createdAt,
        bool $instantPaymentScheme,
        string $merchantAppID,
        string $merchantID,
        Price $price,
        string $referenceID,
        string $shopName,
        string $status,
        mixed $updatedAt,
        ?string $bankID = null,
        ?string $bankStatementReference = null,
        ?BillingAddress $billingAddress = null,
        ?string $category = null,
        ?ClimateActionMode $climateActionMode = null,
        ?float $co2Grams = null,
        ?string $customerID = null,
        ?Destination $destination = null,
        ?string $displayID = null,
        ?bool $guest = null,
        ?array $impactOffsetProjects = null,
        ?array $lineItems = null,
        ?Mandate $mandate = null,
        ?MerchantFinancialAddress $merchantFinancialAddress = null,
        ?array $metadata = null,
        ?string $offsetProject = null,
        ?PayerFinancialAddress $payerFinancialAddress = null,
        ?string $paymentMethodType = null,
        ?string $paymentMode = null,
        ?string $paymentStatus = null,
        ?float $refundAmount = null,
        ?array $refunds = null,
        ?bool $setupPaymentMandate = null,
        ?ShippingAddress $shippingAddress = null,
        ?string $shopLogo = null,
        ?Shopper $shopper = null,
        ?string $shopperEmail = null,
        ?StatusClassification $statusClassification = null,
        ?array $statusHistoryList = null,
        ?string $subaccountID = null,
        ?string $subaccountLegalName = null,
        ?float $trees = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->appID = $appID;
        $obj->applicationFeeAmount = $applicationFeeAmount;
        $obj->createdAt = $createdAt;
        $obj->instantPaymentScheme = $instantPaymentScheme;
        $obj->merchantAppID = $merchantAppID;
        $obj->merchantID = $merchantID;
        $obj->price = $price;
        $obj->referenceID = $referenceID;
        $obj->shopName = $shopName;
        $obj->status = $status;
        $obj->updatedAt = $updatedAt;

        null !== $bankID && $obj->bankID = $bankID;
        null !== $bankStatementReference && $obj->bankStatementReference = $bankStatementReference;
        null !== $billingAddress && $obj->billingAddress = $billingAddress;
        null !== $category && $obj->category = $category;
        null !== $climateActionMode && $obj->climateActionMode = $climateActionMode;
        null !== $co2Grams && $obj->co2Grams = $co2Grams;
        null !== $customerID && $obj->customerID = $customerID;
        null !== $destination && $obj->destination = $destination;
        null !== $displayID && $obj->displayID = $displayID;
        null !== $guest && $obj->guest = $guest;
        null !== $impactOffsetProjects && $obj->impactOffsetProjects = $impactOffsetProjects;
        null !== $lineItems && $obj->lineItems = $lineItems;
        null !== $mandate && $obj->mandate = $mandate;
        null !== $merchantFinancialAddress && $obj->merchantFinancialAddress = $merchantFinancialAddress;
        null !== $metadata && $obj->metadata = $metadata;
        null !== $offsetProject && $obj->offsetProject = $offsetProject;
        null !== $payerFinancialAddress && $obj->payerFinancialAddress = $payerFinancialAddress;
        null !== $paymentMethodType && $obj->paymentMethodType = $paymentMethodType;
        null !== $paymentMode && $obj->paymentMode = $paymentMode;
        null !== $paymentStatus && $obj->paymentStatus = $paymentStatus;
        null !== $refundAmount && $obj->refundAmount = $refundAmount;
        null !== $refunds && $obj->refunds = $refunds;
        null !== $setupPaymentMandate && $obj->setupPaymentMandate = $setupPaymentMandate;
        null !== $shippingAddress && $obj->shippingAddress = $shippingAddress;
        null !== $shopLogo && $obj->shopLogo = $shopLogo;
        null !== $shopper && $obj->shopper = $shopper;
        null !== $shopperEmail && $obj->shopperEmail = $shopperEmail;
        null !== $statusClassification && $obj->statusClassification = $statusClassification;
        null !== $statusHistoryList && $obj->statusHistoryList = $statusHistoryList;
        null !== $subaccountID && $obj->subaccountID = $subaccountID;
        null !== $subaccountLegalName && $obj->subaccountLegalName = $subaccountLegalName;
        null !== $trees && $obj->trees = $trees;

        return $obj;
    }

    /**
     * The unique id for the order.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The unique id for the merchantApp which initiated the order.
     */
    public function withAppID(string $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    /**
     * The amount of application fee collected with the order.
     */
    public function withApplicationFeeAmount(float $applicationFeeAmount): self
    {
        $obj = clone $this;
        $obj->applicationFeeAmount = $applicationFeeAmount;

        return $obj;
    }

    public function withCreatedAt(mixed $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withInstantPaymentScheme(bool $instantPaymentScheme): self
    {
        $obj = clone $this;
        $obj->instantPaymentScheme = $instantPaymentScheme;

        return $obj;
    }

    /**
     * Same as appId.
     */
    public function withMerchantAppID(string $merchantAppID): self
    {
        $obj = clone $this;
        $obj->merchantAppID = $merchantAppID;

        return $obj;
    }

    public function withMerchantID(string $merchantID): self
    {
        $obj = clone $this;
        $obj->merchantID = $merchantID;

        return $obj;
    }

    /**
     * The price object. All values in decimals, e.g. 0.13 for 13 cents.
     */
    public function withPrice(Price $price): self
    {
        $obj = clone $this;
        $obj->price = $price;

        return $obj;
    }

    /**
     * A unique id for the order which can be set when creating the checkoutSession.
     */
    public function withReferenceID(string $referenceID): self
    {
        $obj = clone $this;
        $obj->referenceID = $referenceID;

        return $obj;
    }

    /**
     * The legal name of the merchant which initiated the order.
     */
    public function withShopName(string $shopName): self
    {
        $obj = clone $this;
        $obj->shopName = $shopName;

        return $obj;
    }

    /**
     * The status of the order. As soon as this value is 'paid', you can ship the order.
     *
     * @param Status::* $status
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    public function withUpdatedAt(mixed $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * The unique identifier of the customer's bank.
     */
    public function withBankID(string $bankID): self
    {
        $obj = clone $this;
        $obj->bankID = $bankID;

        return $obj;
    }

    /**
     * The reference that will be shown on the bank statement of the customer. Only available after a successful DirectDebit initiation.
     */
    public function withBankStatementReference(
        string $bankStatementReference
    ): self {
        $obj = clone $this;
        $obj->bankStatementReference = $bankStatementReference;

        return $obj;
    }

    public function withBillingAddress(BillingAddress $billingAddress): self
    {
        $obj = clone $this;
        $obj->billingAddress = $billingAddress;

        return $obj;
    }

    /**
     * The merchant category code for the account. MCCs are used to classify businesses based on the goods or services they provide.
     */
    public function withCategory(string $category): self
    {
        $obj = clone $this;
        $obj->category = $category;

        return $obj;
    }

    public function withClimateActionMode(
        ClimateActionMode $climateActionMode
    ): self {
        $obj = clone $this;
        $obj->climateActionMode = $climateActionMode;

        return $obj;
    }

    public function withCo2Grams(float $co2Grams): self
    {
        $obj = clone $this;
        $obj->co2Grams = $co2Grams;

        return $obj;
    }

    /**
     * The unique identifier of the customer who placed the order.
     */
    public function withCustomerID(string $customerID): self
    {
        $obj = clone $this;
        $obj->customerID = $customerID;

        return $obj;
    }

    /**
     * The destination bank account and statement reference for the order.
     */
    public function withDestination(Destination $destination): self
    {
        $obj = clone $this;
        $obj->destination = $destination;

        return $obj;
    }

    /**
     * The customer-facing id of the order.
     */
    public function withDisplayID(string $displayID): self
    {
        $obj = clone $this;
        $obj->displayID = $displayID;

        return $obj;
    }

    public function withGuest(bool $guest): self
    {
        $obj = clone $this;
        $obj->guest = $guest;

        return $obj;
    }

    /**
     * @param list<mixed> $impactOffsetProjects
     */
    public function withImpactOffsetProjects(array $impactOffsetProjects): self
    {
        $obj = clone $this;
        $obj->impactOffsetProjects = $impactOffsetProjects;

        return $obj;
    }

    /**
     * The list of line items sold with the order.
     *
     * @param list<LineItem> $lineItems
     */
    public function withLineItems(array $lineItems): self
    {
        $obj = clone $this;
        $obj->lineItems = $lineItems;

        return $obj;
    }

    public function withMandate(Mandate $mandate): self
    {
        $obj = clone $this;
        $obj->mandate = $mandate;

        return $obj;
    }

    /**
     * The financial address of the merchant associated with the order. Only available when requested via order/details and therefore requires authentication.
     */
    public function withMerchantFinancialAddress(
        MerchantFinancialAddress $merchantFinancialAddress
    ): self {
        $obj = clone $this;
        $obj->merchantFinancialAddress = $merchantFinancialAddress;

        return $obj;
    }

    /**
     * Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
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
     * The project related to the order.
     */
    public function withOffsetProject(string $offsetProject): self
    {
        $obj = clone $this;
        $obj->offsetProject = $offsetProject;

        return $obj;
    }

    /**
     * The financial address of the payer associated with the order. Only available after successful PIS flow.
     */
    public function withPayerFinancialAddress(
        PayerFinancialAddress $payerFinancialAddress
    ): self {
        $obj = clone $this;
        $obj->payerFinancialAddress = $payerFinancialAddress;

        return $obj;
    }

    /**
     * @param PaymentMethodType::* $paymentMethodType
     */
    public function withPaymentMethodType(string $paymentMethodType): self
    {
        $obj = clone $this;
        $obj->paymentMethodType = $paymentMethodType;

        return $obj;
    }

    /**
     * The payment mode of the order. Can be either settlement or direct.
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
     * Deprecated. The status of the payment.
     *
     * @param PaymentStatus::* $paymentStatus
     */
    public function withPaymentStatus(string $paymentStatus): self
    {
        $obj = clone $this;
        $obj->paymentStatus = $paymentStatus;

        return $obj;
    }

    /**
     * The total amount in the currency of all successful refunds for this order.
     */
    public function withRefundAmount(float $refundAmount): self
    {
        $obj = clone $this;
        $obj->refundAmount = $refundAmount;

        return $obj;
    }

    /**
     * All partial and total refunds of this order.
     *
     * @param list<Refund> $refunds
     */
    public function withRefunds(array $refunds): self
    {
        $obj = clone $this;
        $obj->refunds = $refunds;

        return $obj;
    }

    /**
     * If set to true, a payment mandate will be created for the user. This is currently in alpha and defaults to false.
     */
    public function withSetupPaymentMandate(bool $setupPaymentMandate): self
    {
        $obj = clone $this;
        $obj->setupPaymentMandate = $setupPaymentMandate;

        return $obj;
    }

    public function withShippingAddress(ShippingAddress $shippingAddress): self
    {
        $obj = clone $this;
        $obj->shippingAddress = $shippingAddress;

        return $obj;
    }

    public function withShopLogo(string $shopLogo): self
    {
        $obj = clone $this;
        $obj->shopLogo = $shopLogo;

        return $obj;
    }

    /**
     * Information about the customer who finished the order.
     */
    public function withShopper(Shopper $shopper): self
    {
        $obj = clone $this;
        $obj->shopper = $shopper;

        return $obj;
    }

    /**
     * Deprecated. The email of the customer who completed the order.
     */
    public function withShopperEmail(string $shopperEmail): self
    {
        $obj = clone $this;
        $obj->shopperEmail = $shopperEmail;

        return $obj;
    }

    public function withStatusClassification(
        StatusClassification $statusClassification
    ): self {
        $obj = clone $this;
        $obj->statusClassification = $statusClassification;

        return $obj;
    }

    /**
     * @param list<StatusHistoryList> $statusHistoryList
     */
    public function withStatusHistoryList(array $statusHistoryList): self
    {
        $obj = clone $this;
        $obj->statusHistoryList = $statusHistoryList;

        return $obj;
    }

    /**
     * The subaccount id of the merchant.
     */
    public function withSubaccountID(string $subaccountID): self
    {
        $obj = clone $this;
        $obj->subaccountID = $subaccountID;

        return $obj;
    }

    public function withSubaccountLegalName(string $subaccountLegalName): self
    {
        $obj = clone $this;
        $obj->subaccountLegalName = $subaccountLegalName;

        return $obj;
    }

    public function withTrees(float $trees): self
    {
        $obj = clone $this;
        $obj->trees = $trees;

        return $obj;
    }
}
