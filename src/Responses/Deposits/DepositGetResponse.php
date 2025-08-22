<?php

declare(strict_types=1);

namespace Getivy\Responses\Deposits;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Core\Conversion\ListOf;
use Getivy\Responses\Deposits\DepositGetResponse\Currency;
use Getivy\Responses\Deposits\DepositGetResponse\Payee;
use Getivy\Responses\Deposits\DepositGetResponse\Payer;
use Getivy\Responses\Deposits\DepositGetResponse\Return;
use Getivy\Responses\Deposits\DepositGetResponse\Status;

final class DepositGetResponse implements BaseModel
{
  use SdkModel;

  /**
  * The ID of the deposit
  * 
  * @var string $id
 */
  #[Api]
  public string $id;

  /**
  * The amount of the deposit
  * 
  * @var float $amount
 */
  #[Api]
  public float $amount;

  /**
  * The currency of the deposit
  * 
  * @var Currency::* $currency
 */
  #[Api(enum: Currency::class)]
  public string $currency;

  /**
  * The payee account identifier
  * 
  * @var Payee $payee
 */
  #[Api]
  public Payee $payee;

  /**
  * The payer account identifier
  * 
  * @var Payer $payer
 */
  #[Api]
  public Payer $payer;

  /**
  * The date and time the deposit was received
  * 
  * @var \DateTimeInterface $receivedAt
 */
  #[Api]
  public \DateTimeInterface $receivedAt;

  /** @var list<Return> $returns */
  #[Api(type: new ListOf(Return::class))]
  public array $returns;

  /**
  * The status of the deposit
  * 
  * @var Status::* $status
 */
  #[Api(enum: Status::class)]
  public string $status;

  /**
  * The ID of the transaction that initiated the deposit
  * 
  * @var string $transactionID
 */
  #[Api("transactionId")]
  public string $transactionID;

  /**
  * The reference that appears on the bank statement
  * 
  * @var string|null $bankStatementReference
 */
  #[Api(optional: true)]
  public ?string $bankStatementReference;

  /**
  * The payment rail used for the deposit
  * 
  * @var string|null $rail
 */
  #[Api(optional: true)]
  public ?string $rail;

  /**
  * `new DepositGetResponse()` is missing required properties by the API.
  * 
  * To enforce required parameters use
  * ```
  * DepositGetResponse::with(
  *   id: ...,
  *   amount: ...,
  *   currency: ...,
  *   payee: ...,
  *   payer: ...,
  *   receivedAt: ...,
  *   returns: ...,
  *   status: ...,
  *   transactionID: ...,
  * )
  * ```
  * 
  * Otherwise ensure the following setters are called
  * 
  * ```
  * (new DepositGetResponse)
  *   ->withID(...)
  *   ->withAmount(...)
  *   ->withCurrency(...)
  *   ->withPayee(...)
  *   ->withPayer(...)
  *   ->withReceivedAt(...)
  *   ->withReturns(...)
  *   ->withStatus(...)
  *   ->withTransactionID(...)
  * ```
 */
  public function __construct(){
    self::introspect();
    $this->unsetOptionalProperties();
  }

  /**
  * Construct an instance from the required parameters.
  * 
  * You must use named parameters to construct any parameters with a default value.
  * 
  * @param string $id
  * @param float $amount
  * @param Currency::* $currency
  * @param Payee $payee
  * @param Payer $payer
  * @param \DateTimeInterface $receivedAt
  * @param list<Return> $returns
  * @param Status::* $status
  * @param string $transactionID
  * @param string|null $bankStatementReference
  * @param string|null $rail
  * 
  * @return self
 */
  public static function with(
    string $id,
    float $amount,
    string $currency,
    Payee $payee,
    Payer $payer,
    \DateTimeInterface $receivedAt,
    array $returns,
    string $status,
    string $transactionID,
    ?string $bankStatementReference = null,
    ?string $rail = null,
  ): self {
    $obj = new self;

    $obj->id = $id;
    $obj->amount = $amount;
    $obj->currency = $currency;
    $obj->payee = $payee;
    $obj->payer = $payer;
    $obj->receivedAt = $receivedAt;
    $obj->returns = $returns;
    $obj->status = $status;
    $obj->transactionID = $transactionID;

    null !== $bankStatementReference && $obj->bankStatementReference = $bankStatementReference;
    null !== $rail && $obj->rail = $rail;

    return $obj;
  }

  /**
  * The ID of the deposit
  * 
  * @param string $id
  * 
  * @return self
 */
  public function withID(string $id): self {
    $obj = clone $this;
    $obj->id = $id;
    return $obj;
  }

  /**
  * The amount of the deposit
  * 
  * @param float $amount
  * 
  * @return self
 */
  public function withAmount(float $amount): self {
    $obj = clone $this;
    $obj->amount = $amount;
    return $obj;
  }

  /**
  * The currency of the deposit
  * 
  * @param Currency::* $currency
  * 
  * @return self
 */
  public function withCurrency(string $currency): self {
    $obj = clone $this;
    $obj->currency = $currency;
    return $obj;
  }

  /**
  * The payee account identifier
  * 
  * @param Payee $payee
  * 
  * @return self
 */
  public function withPayee(Payee $payee): self {
    $obj = clone $this;
    $obj->payee = $payee;
    return $obj;
  }

  /**
  * The payer account identifier
  * 
  * @param Payer $payer
  * 
  * @return self
 */
  public function withPayer(Payer $payer): self {
    $obj = clone $this;
    $obj->payer = $payer;
    return $obj;
  }

  /**
  * The date and time the deposit was received
  * 
  * @param \DateTimeInterface $receivedAt
  * 
  * @return self
 */
  public function withReceivedAt(\DateTimeInterface $receivedAt): self {
    $obj = clone $this;
    $obj->receivedAt = $receivedAt;
    return $obj;
  }

  /**
  * @param list<Return> $returns
  * 
  * @return self
 */
  public function withReturns(array $returns): self {
    $obj = clone $this;
    $obj->returns = $returns;
    return $obj;
  }

  /**
  * The status of the deposit
  * 
  * @param Status::* $status
  * 
  * @return self
 */
  public function withStatus(string $status): self {
    $obj = clone $this;
    $obj->status = $status;
    return $obj;
  }

  /**
  * The ID of the transaction that initiated the deposit
  * 
  * @param string $transactionID
  * 
  * @return self
 */
  public function withTransactionID(string $transactionID): self {
    $obj = clone $this;
    $obj->transactionID = $transactionID;
    return $obj;
  }

  /**
  * The reference that appears on the bank statement
  * 
  * @param string $bankStatementReference
  * 
  * @return self
 */
  public function withBankStatementReference(
    string $bankStatementReference
  ): self {
    $obj = clone $this;
    $obj->bankStatementReference = $bankStatementReference;
    return $obj;
  }

  /**
  * The payment rail used for the deposit
  * 
  * @param string $rail
  * 
  * @return self
 */
  public function withRail(string $rail): self {
    $obj = clone $this;
    $obj->rail = $rail;
    return $obj;
  }
}