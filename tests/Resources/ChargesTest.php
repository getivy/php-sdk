<?php

namespace Tests\Resources;

use Getivy\Charges\ChargeCreateParams\Metadata;
use Getivy\Charges\ChargeCreateParams\Price;
use Getivy\Client;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ChargesTest extends TestCase
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

        $result = $this->client->charges->create(
            idempotencyKey: 'idempotencyKey',
            mandateID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            metadata: (new Metadata),
            price: Price::with(currency: 'EUR', total: 1.01),
            referenceID: 'referenceId',
        );

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->charges->create(
            idempotencyKey: 'idempotencyKey',
            mandateID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            metadata: (new Metadata)->withVerificationToken('verificationToken'),
            price: Price::with(currency: 'EUR', total: 1.01)
                ->withShipping(0)
                ->withSubTotal(0)
                ->withTotalNet(0)
                ->withVat(0),
            referenceID: 'referenceId',
        );

        $this->assertTrue(true); // @phpstan-ignore-line
    }
}
