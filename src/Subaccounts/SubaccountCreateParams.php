<?php

declare(strict_types=1);

namespace Getivy\Subaccounts;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Create a Subaccount which can be used to reconcile orders, refunds and payouts more easily.
 */
final class SubaccountCreateParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The legal name of the Subaccount.
     */
    #[Api]
    public string $legalName;

    /**
     * The merchant category code of the Subaccount. See [here](https://www.citibank.com/tts/solutions/commercial-cards/assets/docs/govt/Merchant-Category-Codes.pdf) for more information.
     */
    #[Api]
    public string $mcc;

    /**
     * The website url of the Subaccount.
     */
    #[Api('websiteUrl', optional: true)]
    public ?string $websiteURL;

    /**
     * `new SubaccountCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubaccountCreateParams::with(legalName: ..., mcc: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubaccountCreateParams)->withLegalName(...)->withMcc(...)
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
     */
    public static function with(
        string $legalName,
        string $mcc,
        ?string $websiteURL = null
    ): self {
        $obj = new self;

        $obj->legalName = $legalName;
        $obj->mcc = $mcc;

        null !== $websiteURL && $obj->websiteURL = $websiteURL;

        return $obj;
    }

    /**
     * The legal name of the Subaccount.
     */
    public function withLegalName(string $legalName): self
    {
        $obj = clone $this;
        $obj->legalName = $legalName;

        return $obj;
    }

    /**
     * The merchant category code of the Subaccount. See [here](https://www.citibank.com/tts/solutions/commercial-cards/assets/docs/govt/Merchant-Category-Codes.pdf) for more information.
     */
    public function withMcc(string $mcc): self
    {
        $obj = clone $this;
        $obj->mcc = $mcc;

        return $obj;
    }

    /**
     * The website url of the Subaccount.
     */
    public function withWebsiteURL(string $websiteURL): self
    {
        $obj = clone $this;
        $obj->websiteURL = $websiteURL;

        return $obj;
    }
}
