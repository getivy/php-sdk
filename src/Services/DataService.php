<?php

declare(strict_types=1);

namespace Getivy\Services;

use Getivy\Client;
use Getivy\Contracts\DataContract;
use Getivy\Services\Data\AccountsService;
use Getivy\Services\Data\BalancesService;
use Getivy\Services\Data\ConsentService;
use Getivy\Services\Data\SessionService;
use Getivy\Services\Data\TransactionsService;

final class DataService implements DataContract
{
    public SessionService $session;

    public ConsentService $consent;

    public AccountsService $accounts;

    public TransactionsService $transactions;

    public BalancesService $balances;

    public function __construct(private Client $client)
    {
        $this->session = new SessionService($this->client);
        $this->consent = new ConsentService($this->client);
        $this->accounts = new AccountsService($this->client);
        $this->transactions = new TransactionsService($this->client);
        $this->balances = new BalancesService($this->client);
    }
}
