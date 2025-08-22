<?php

declare(strict_types=1);

namespace Getivy\Contracts;

use Getivy\Banks\BankListParams\Capability;
use Getivy\Banks\BankListParams\Currency;
use Getivy\Banks\BankListParams\Market;
use Getivy\Banks\BankSearchParams\Capability as Capability1;
use Getivy\Banks\BankSearchParams\Currency as Currency1;
use Getivy\Banks\BankSearchParams\Market as Market1;
use Getivy\RequestOptions;
use Getivy\Responses\Banks\BankGetResponse;
use Getivy\Responses\Banks\BankListResponse;
use Getivy\Responses\Banks\BankSearchResponse;

interface BanksContract
{
    /**
     * @param string $id the id is a unique identifier of the bank within Ivy
     */
    public function retrieve(
        $id,
        ?RequestOptions $requestOptions = null
    ): BankGetResponse;

    /**
     * @param Capability::* $capability Filter banks with provided capability only. `ais` for data products, `pis` for payment products.
     * @param Currency::* $currency ISO 4217 currency code. Filter banks with provided currency only.
     * @param string $group If provided the list will show banks in this group only. Groups are e.g. "Sparkasse", i.e. a group of different bank branches of the same brand.
     * @param float $limit The maximum number of banks to return (default 1000)
     * @param Market::* $market ISO 3166-1 alpha-2 country code. Filter banks with provided market only.
     * @param mixed $sessionID The internal checkout session id. For internal use only.
     * @param float $skip The number of banks to skip
     */
    public function list(
        $capability = null,
        $currency = null,
        $group = null,
        $limit = null,
        $market = null,
        $sessionID = null,
        $skip = null,
        ?RequestOptions $requestOptions = null,
    ): BankListResponse;

    /**
     * @param Capability1::* $capability Filter banks with provided capability only. `ais` for data products, `pis` for payment products.
     * @param Currency1::* $currency ISO 4217 currency code. Filter banks with provided currency only.
     * @param string $group If provided the list will show banks in this group only. Groups are e.g. "Sparkasse", i.e. a group of different bank branches of the same brand.
     * @param float $limit The maximum number of banks to return (default 1000)
     * @param Market1::* $market ISO 3166-1 alpha-2 country code. Filter banks with provided market only. If not provided, all banks are returned.
     * @param string $search The search query. Banks with names matching the query are returned. If the string is empty or undefined, a list of default banks is returned.
     * @param mixed $sessionID The internal checkout session id. For internal use only.
     * @param float $skip The number of banks to skip
     */
    public function search(
        $capability = null,
        $currency = null,
        $group = null,
        $limit = null,
        $market = null,
        $search = null,
        $sessionID = null,
        $skip = null,
        ?RequestOptions $requestOptions = null,
    ): BankSearchResponse;
}
