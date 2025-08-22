<?php

namespace Tests\Resources;

use Getivy\Client;
use Getivy\Payouts\PayoutCreateParams\Destination;
use Getivy\Payouts\PayoutCreateParams\Destination\FinancialAddress;
use Getivy\Payouts\PayoutCreateParams\Destination\FinancialAddress\BankCode;
use Getivy\Payouts\PayoutCreateParams\Destination\FinancialAddress\Bban;
use Getivy\Payouts\PayoutCreateParams\Destination\FinancialAddress\Iban;
use Getivy\Payouts\PayoutCreateParams\Destination\FinancialAddress\SortCode;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PayoutsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->payouts->create(
            amount: 1.01,
            currency: 'EUR',
            destination: (new Destination)
        );

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->payouts->create(
            amount: 1.01,
            currency: 'EUR',
            destination: (new Destination)
                ->withFinancialAddress(
                    FinancialAddress::with(type: 'iban')
                        ->withBankCode(
                            BankCode::with(
                                accountHolderName: 'x',
                                accountNumber: 'accountNumber',
                                code: 'code'
                            ),
                        )
                        ->withBban(
                            Bban::with(accountHolderName: 'x', bban: 'bban')->withBic('bic')
                        )
                        ->withIban(
                            Iban::with(accountHolderName: 'x', iban: 'iban')->withBic('bic')
                        )
                        ->withSortCode(
                            SortCode::with(
                                accountHolderName: 'x',
                                accountNumber: '095',
                                sortCode: '269125115713',
                            ),
                        ),
                )
                ->withOrderID('orderId')
                ->withType('beneficiary'),
        );

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->payouts->retrieve('id');

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->payouts->retrieve('id');

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->payouts->list();

        $this->assertTrue(true); // @phpstan-ignore-line
    }
}
