<?php

declare(strict_types=1);

namespace Getivy\Contracts;

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
use Getivy\RequestOptions;
use Getivy\Responses\Checkoutsession\CheckoutsessionExpireResponse;
use Getivy\Responses\Checkoutsession\CheckoutsessionGetResponse;
use Getivy\Responses\Checkoutsession\CheckoutsessionNewResponse;

interface CheckoutsessionContract
{
    /**
     * @param Price $price Price of the checkout session
     * @param string $referenceID An internal reference id which will be stored with the order. Needs to be unique per shop and can be up to 200 characters.
     * @param BillingAddress $billingAddress the billing address of the customer
     * @param string $completeCallbackURL complete Callback requests will be sent to this URL on default
     * @param float $created The Epoch time in seconds at which the Checkout Session was created. By default, time of api CheckoutSession creation at Ivy.
     * @param Customer $customer
     * @param bool $disableBankSelection Disable bank selection mode. If set to true, customers cannot modify the pre selected bank.
     * @param string $displayID The order id which will be displayed to the user and in the merchant dashboard. At most 200 characters are allowed.
     * @param string $errorCallbackURL users will be redirected here on default after an unsuccessful checkout
     * @param float $expiresAt The Epoch time in seconds at which the Checkout Session will expire. It can be anywhere from 30 minutes to 24 hours after Checkout Session creation. By default, this value is 1 hour from creation.
     * @param bool $express Sets the checkout to a express version
     * @param list<LineItem> $lineItems All line items of this checkout session. At least one line item required
     * @param Locale::* $locale
     * @param Mandate $mandate
     * @param Market::* $market The market of the checkoutSession. Will show the market banks connected with this market
     * @param array<string,
     * mixed,> $metadata Any data which will be stored and returned for this checkout session and corresponding order
     * @param PaymentMode::* $paymentMode The mode in which the payment should be processed. If direct is used, you need to provide a settlementDestination
     * @param PaymentSchemeSelection::* $paymentSchemeSelection
     * @param Prefill $prefill the values specified here will be pre-filled in the Ivy Checkout
     * @param string $quoteCallbackURL quote Callback requests will be sent to this URL on default
     * @param SettlementDestination $settlementDestination
     * @param string $subaccountID
     * @param string $successCallbackURL users will be redirected here on default after a successful checkout
     * @param ThemeVariant::* $themeVariant
     */
    public function create(
        $price,
        $referenceID,
        $billingAddress = null,
        $completeCallbackURL = null,
        $created = null,
        $customer = null,
        $disableBankSelection = null,
        $displayID = null,
        $errorCallbackURL = null,
        $expiresAt = null,
        $express = null,
        $lineItems = null,
        $locale = null,
        $mandate = null,
        $market = null,
        $metadata = null,
        $paymentMode = null,
        $paymentSchemeSelection = null,
        $prefill = null,
        $quoteCallbackURL = null,
        $settlementDestination = null,
        $subaccountID = null,
        $successCallbackURL = null,
        $themeVariant = null,
        ?RequestOptions $requestOptions = null,
    ): CheckoutsessionNewResponse;

    /**
     * @param string $id The checkout session id to retrieve details for
     */
    public function retrieve(
        $id,
        ?RequestOptions $requestOptions = null
    ): CheckoutsessionGetResponse;

    /**
     * @param string $id The checkout session id to expire. By expiring a Checkout Session, users will not be able to access this Checkout Session anymore.
     */
    public function expire(
        $id,
        ?RequestOptions $requestOptions = null
    ): CheckoutsessionExpireResponse;
}
