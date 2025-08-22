<?php

declare(strict_types=1);

namespace Getivy;

use Getivy\Core\BaseClient;
use Getivy\Services\BalanceService;
use Getivy\Services\BanksService;
use Getivy\Services\BeneficiaryPayoutsService;
use Getivy\Services\CapabilitiesService;
use Getivy\Services\ChargesService;
use Getivy\Services\CheckoutsessionService;
use Getivy\Services\CustomersService;
use Getivy\Services\DataService;
use Getivy\Services\DepositsService;
use Getivy\Services\FxService;
use Getivy\Services\MandatesService;
use Getivy\Services\OrdersService;
use Getivy\Services\PayoutsService;
use Getivy\Services\RefundsService;
use Getivy\Services\ReturnsService;
use Getivy\Services\SubaccountsService;
use Getivy\Services\TransactionsService;
use Getivy\Services\WebhookService;

class Client extends BaseClient
{
    public string $apiKey;

    public BanksService $banks;

    public CheckoutsessionService $checkoutsession;

    public DataService $data;

    public CustomersService $customers;

    public OrdersService $orders;

    public ChargesService $charges;

    public DepositsService $deposits;

    public ReturnsService $returns;

    public FxService $fx;

    public BeneficiaryPayoutsService $beneficiaryPayouts;

    public TransactionsService $transactions;

    public MandatesService $mandates;

    public CapabilitiesService $capabilities;

    public RefundsService $refunds;

    public PayoutsService $payouts;

    public SubaccountsService $subaccounts;

    public BalanceService $balance;

    public WebhookService $webhook;

    public function __construct(?string $apiKey = null, ?string $baseUrl = null)
    {
        $this->apiKey = (string) ($apiKey ?? getenv('IVY_API_KEY'));

        $base = $baseUrl ?? getenv('IVY_BASE_URL') ?: 'https://api.getivy.de';

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json', 'Accept' => 'application/json',
            ],
            baseUrl: $base,
            options: new RequestOptions,
        );

        $this->banks = new BanksService($this);
        $this->checkoutsession = new CheckoutsessionService($this);
        $this->data = new DataService($this);
        $this->customers = new CustomersService($this);
        $this->orders = new OrdersService($this);
        $this->charges = new ChargesService($this);
        $this->deposits = new DepositsService($this);
        $this->returns = new ReturnsService($this);
        $this->fx = new FxService($this);
        $this->beneficiaryPayouts = new BeneficiaryPayoutsService($this);
        $this->transactions = new TransactionsService($this);
        $this->mandates = new MandatesService($this);
        $this->capabilities = new CapabilitiesService($this);
        $this->refunds = new RefundsService($this);
        $this->payouts = new PayoutsService($this);
        $this->subaccounts = new SubaccountsService($this);
        $this->balance = new BalanceService($this);
        $this->webhook = new WebhookService($this);
    }

    /** @return array<string, string> */
    protected function authHeaders(): array
    {
        return ['X-Ivy-Api-Key' => $this->apiKey];
    }
}
