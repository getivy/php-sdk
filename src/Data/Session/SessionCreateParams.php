<?php

declare(strict_types=1);

namespace Getivy\Data\Session;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Core\Conversion\MapOf;
use Getivy\Data\Session\SessionCreateParams\Locale;
use Getivy\Data\Session\SessionCreateParams\Market;
use Getivy\Data\Session\SessionCreateParams\Prefill;
use Getivy\Data\Session\SessionCreateParams\ThemeVariant;

/**
 * Creates a data session for the merchant corresponding to the API key.
 */
final class SessionCreateParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * An internal reference id which will be stored with the data session. Needs to be unique per data session. Maximum length is 200 characters.
     */
    #[Api('referenceId')]
    public string $referenceID;

    /**
     * Required when setting expiresAt. The Epoch time in seconds at which the Session was created.
     */
    #[Api(optional: true)]
    public ?float $createdAt;

    /**
     * False by default. If set to true, customers cannot choose another bank than the pre-selected one.
     */
    #[Api(optional: true)]
    public ?bool $disableBankSelection;

    /**
     * Currently only visible in the merchant dashboard. This id used to be displayed to the user during the checkout.
     */
    #[Api('displayId', optional: true)]
    public ?string $displayID;

    /**
     * Required if not set in the dashboard. Users will be redirected here after a unsuccessful session.
     */
    #[Api('errorCallbackUrl', optional: true)]
    public ?string $errorCallbackURL;

    /**
     * The Epoch time in seconds at which the Session should expire. It can be anywhere from 30 minutes to 24 hours after Session creation. By default, this value is 1 hour from creation. When setting this field, you also need to set `created`.
     */
    #[Api(optional: true)]
    public ?float $expiresAt;

    /**
     * The locale of the data session. If not provided, the default locale will be used.
     *
     * @var Locale::*|null $locale
     */
    #[Api(enum: Locale::class, optional: true)]
    public ?string $locale;

    /**
     * ISO 3166-1 alpha-2 country code of the market. If set, the market's default banks will be displayed during the Data Session.
     *
     * @var Market::*|null $market
     */
    #[Api(enum: Market::class, optional: true)]
    public ?string $market;

    /**
     * Any data which will be stored and returned for this data session. See [here](https://docs.getivy.de/reference/metadata) for more info.
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
     * Required if not set in the dashboard. Users will be redirected here after a successful session.
     */
    #[Api('successCallbackUrl', optional: true)]
    public ?string $successCallbackURL;

    /**
     * The theme variant which will be used in the data session. If not provided, the default light theme will be used.
     *
     * @var ThemeVariant::*|null $themeVariant
     */
    #[Api(enum: ThemeVariant::class, optional: true)]
    public ?string $themeVariant;

    /**
     * `new SessionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SessionCreateParams::with(referenceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SessionCreateParams)->withReferenceID(...)
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
     * @param Locale::*|null $locale
     * @param Market::*|null $market
     * @param array<string, mixed>|null $metadata
     * @param ThemeVariant::*|null $themeVariant
     */
    public static function with(
        string $referenceID,
        ?float $createdAt = null,
        ?bool $disableBankSelection = null,
        ?string $displayID = null,
        ?string $errorCallbackURL = null,
        ?float $expiresAt = null,
        ?string $locale = null,
        ?string $market = null,
        ?array $metadata = null,
        ?Prefill $prefill = null,
        ?string $successCallbackURL = null,
        ?string $themeVariant = null,
    ): self {
        $obj = new self;

        $obj->referenceID = $referenceID;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $disableBankSelection && $obj->disableBankSelection = $disableBankSelection;
        null !== $displayID && $obj->displayID = $displayID;
        null !== $errorCallbackURL && $obj->errorCallbackURL = $errorCallbackURL;
        null !== $expiresAt && $obj->expiresAt = $expiresAt;
        null !== $locale && $obj->locale = $locale;
        null !== $market && $obj->market = $market;
        null !== $metadata && $obj->metadata = $metadata;
        null !== $prefill && $obj->prefill = $prefill;
        null !== $successCallbackURL && $obj->successCallbackURL = $successCallbackURL;
        null !== $themeVariant && $obj->themeVariant = $themeVariant;

        return $obj;
    }

    /**
     * An internal reference id which will be stored with the data session. Needs to be unique per data session. Maximum length is 200 characters.
     */
    public function withReferenceID(string $referenceID): self
    {
        $obj = clone $this;
        $obj->referenceID = $referenceID;

        return $obj;
    }

    /**
     * Required when setting expiresAt. The Epoch time in seconds at which the Session was created.
     */
    public function withCreatedAt(float $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * False by default. If set to true, customers cannot choose another bank than the pre-selected one.
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
     * Required if not set in the dashboard. Users will be redirected here after a unsuccessful session.
     */
    public function withErrorCallbackURL(string $errorCallbackURL): self
    {
        $obj = clone $this;
        $obj->errorCallbackURL = $errorCallbackURL;

        return $obj;
    }

    /**
     * The Epoch time in seconds at which the Session should expire. It can be anywhere from 30 minutes to 24 hours after Session creation. By default, this value is 1 hour from creation. When setting this field, you also need to set `created`.
     */
    public function withExpiresAt(float $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }

    /**
     * The locale of the data session. If not provided, the default locale will be used.
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
     * ISO 3166-1 alpha-2 country code of the market. If set, the market's default banks will be displayed during the Data Session.
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
     * Any data which will be stored and returned for this data session. See [here](https://docs.getivy.de/reference/metadata) for more info.
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

    /**
     * Required if not set in the dashboard. Users will be redirected here after a successful session.
     */
    public function withSuccessCallbackURL(string $successCallbackURL): self
    {
        $obj = clone $this;
        $obj->successCallbackURL = $successCallbackURL;

        return $obj;
    }

    /**
     * The theme variant which will be used in the data session. If not provided, the default light theme will be used.
     *
     * @param ThemeVariant::* $themeVariant
     */
    public function withThemeVariant(string $themeVariant): self
    {
        $obj = clone $this;
        $obj->themeVariant = $themeVariant;

        return $obj;
    }
}
