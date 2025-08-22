<?php

declare(strict_types=1);

namespace Getivy\Contracts\Data;

use Getivy\Data\Session\SessionCreateParams\Locale;
use Getivy\Data\Session\SessionCreateParams\Market;
use Getivy\Data\Session\SessionCreateParams\Prefill;
use Getivy\Data\Session\SessionCreateParams\ThemeVariant;
use Getivy\RequestOptions;
use Getivy\Responses\Data\Session\SessionGetResponse;
use Getivy\Responses\Data\Session\SessionNewResponse;

interface SessionContract
{
    /**
     * @param string $referenceID An internal reference id which will be stored with the data session. Needs to be unique per data session. Maximum length is 200 characters.
     * @param float $createdAt Required when setting expiresAt. The Epoch time in seconds at which the Session was created.
     * @param bool $disableBankSelection False by default. If set to true, customers cannot choose another bank than the pre-selected one.
     * @param string $displayID Currently only visible in the merchant dashboard. This id used to be displayed to the user during the checkout.
     * @param string $errorCallbackURL Required if not set in the dashboard. Users will be redirected here after a unsuccessful session.
     * @param float $expiresAt The Epoch time in seconds at which the Session should expire. It can be anywhere from 30 minutes to 24 hours after Session creation. By default, this value is 1 hour from creation. When setting this field, you also need to set `created`.
     * @param Locale::* $locale The locale of the data session. If not provided, the default locale will be used.
     * @param Market::* $market ISO 3166-1 alpha-2 country code of the market. If set, the market's default banks will be displayed during the Data Session.
     * @param array<string,
     * mixed,> $metadata Any data which will be stored and returned for this data session. See [here](https://docs.getivy.de/reference/metadata) for more info.
     * @param Prefill $prefill Prefill options for the data session
     * @param string $successCallbackURL Required if not set in the dashboard. Users will be redirected here after a successful session.
     * @param ThemeVariant::* $themeVariant The theme variant which will be used in the data session. If not provided, the default light theme will be used.
     */
    public function create(
        $referenceID,
        $createdAt = null,
        $disableBankSelection = null,
        $displayID = null,
        $errorCallbackURL = null,
        $expiresAt = null,
        $locale = null,
        $market = null,
        $metadata = null,
        $prefill = null,
        $successCallbackURL = null,
        $themeVariant = null,
        ?RequestOptions $requestOptions = null,
    ): SessionNewResponse;

    /**
     * @param string $id the id of the data session
     */
    public function retrieve(
        $id,
        ?RequestOptions $requestOptions = null
    ): SessionGetResponse;
}
