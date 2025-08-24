<?php

declare(strict_types=1);

namespace Getivy\Responses\Deposits\DepositGetResponse;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Deposits\DepositGetResponse\Return\Currency;
use Getivy\Responses\Deposits\DepositGetResponse\Return\Status;

final class Return implements BaseModel
{
  use SdkModel;

  /**
  * The ID of the return
  * 
  * @var string $id
 */
  #[Api]
  public string $id;

  /**
  * The amount of the return
  * 
  * @var float $amount
 */
  #[Api]
  public float $amount;

  /**
  * The date and time the return was created
  * 
  * @var \DateTimeInterface $createdAt
 */
  #[Api]
  public \DateTimeInterface $createdAt;

  /**
  * The currency of the return
  * 
  * @var Currency::* $currency
 */
  #[Api(enum: Currency::class)]
  public string $currency;

  /**
  * The ID of the associated deposit
  * 
  * @var string $depositID
 */
  #[Api("depositId")]
  public string $depositID;

  /**
  * The status of the return
  * 
  * @var Status::* $status
 */
  #[Api(enum: Status::class)]
  public string $status;

  /**
  * The date and time the return failed if applicable
  * 
  * @var \DateTimeInterface|null $failedAt
 */
  #[Api(optional: true)]
  public ?\DateTimeInterface $failedAt;

  /**
  * The date and time the return succeeded if applicable
  * 
  * @var \DateTimeInterface|null $succeededAt
 */
  #[Api(optional: true)]
  public ?\DateTimeInterface $succeededAt;

  /**
  * The ID of the resulting return transaction
  * 
  * @var string|null $transactionID
 */
  #[Api("transactionId", optional: true)]
  public ?string $transactionID;

  /**
  * `new Return()` is missing required properties by the API.
  * 
  * To enforce required parameters use
  * ```
  * Return::with(
  *   id: ...,
  *   amount: ...,
  *   createdAt: ...,
  *   currency: ...,
  *   depositID: ...,
  *   status: ...,
  * )
  * ```
  * 
  * Otherwise ensure the following setters are called
  * 
  * ```
  * (new Return)
  *   ->withID(...)
  *   ->withAmount(...)
  *   ->withCreatedAt(...)
  *   ->withCurrency(...)
  *   ->withDepositID(...)
  *   ->withStatus(...)
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
  * @param \DateTimeInterface $createdAt
  * @param Currency::* $currency
  * @param string $depositID
  * @param Status::* $status
  * @param \DateTimeInterface $failedAt
  * @param \DateTimeInterface $succeededAt
  * @param string $transactionID
  * 
  * @return self
 */
  public static function with(
    string $id,
    float $amount,
    \DateTimeInterface $createdAt,
    string $currency,
    string $depositID,
    string $status,
    \DateTimeInterface $failedAt = null,
    \DateTimeInterface $succeededAt = null,
    string $transactionID = null,
  ): self {
    $obj = new self;

    $obj->id = $id;
    $obj->amount = $amount;
    $obj->createdAt = $createdAt;
    $obj->currency = $currency;
    $obj->depositID = $depositID;
    $obj->status = $status;

    null !== $failedAt && $obj->failedAt = $failedAt;
    null !== $succeededAt && $obj->succeededAt = $succeededAt;
    null !== $transactionID && $obj->transactionID = $transactionID;

    return $obj;
  }

  /**
  * The ID of the return
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
  * The amount of the return
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
  * The date and time the return was created
  * 
  * @param \DateTimeInterface $createdAt
  * 
  * @return self
 */
  public function withCreatedAt(\DateTimeInterface $createdAt): self {
    $obj = clone $this;
    $obj->createdAt = $createdAt;
    return $obj;
  }

  /**
  * The currency of the return
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
  * The ID of the associated deposit
  * 
  * @param string $depositID
  * 
  * @return self
 */
  public function withDepositID(string $depositID): self {
    $obj = clone $this;
    $obj->depositID = $depositID;
    return $obj;
  }

  /**
  * The status of the return
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
  * The date and time the return failed if applicable
  * 
  * @param \DateTimeInterface $failedAt
  * 
  * @return self
 */
  public function withFailedAt(\DateTimeInterface $failedAt): self {
    $obj = clone $this;
    $obj->failedAt = $failedAt;
    return $obj;
  }

  /**
  * The date and time the return succeeded if applicable
  * 
  * @param \DateTimeInterface $succeededAt
  * 
  * @return self
 */
  public function withSucceededAt(\DateTimeInterface $succeededAt): self {
    $obj = clone $this;
    $obj->succeededAt = $succeededAt;
    return $obj;
  }

  /**
  * The ID of the resulting return transaction
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
}