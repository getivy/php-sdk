<?php

declare(strict_types=1);

namespace Getivy\Mandates;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Mandates\Mandate\Creditor;
use Getivy\Mandates\Mandate\Debtor;
use Getivy\Mandates\Mandate\Signature;
use Getivy\Mandates\Mandate\Status;

final class Mandate implements BaseModel
{
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public Creditor $creditor;

    #[Api]
    public Debtor $debtor;

    #[Api]
    public string $reference;

    #[Api('referenceId')]
    public string $referenceID;

    #[Api]
    public Signature $signature;

    /** @var Status::* $status */
    #[Api(enum: Status::class)]
    public string $status;

    #[Api(optional: true)]
    public mixed $revokedAt;

    #[Api(optional: true)]
    public ?string $userNotificationEmail;

    /**
     * `new Mandate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Mandate::with(
     *   id: ...,
     *   creditor: ...,
     *   debtor: ...,
     *   reference: ...,
     *   referenceID: ...,
     *   signature: ...,
     *   status: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Mandate)
     *   ->withID(...)
     *   ->withCreditor(...)
     *   ->withDebtor(...)
     *   ->withReference(...)
     *   ->withReferenceID(...)
     *   ->withSignature(...)
     *   ->withStatus(...)
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
     * @param Status::* $status
     */
    public static function with(
        string $id,
        Creditor $creditor,
        Debtor $debtor,
        string $reference,
        string $referenceID,
        Signature $signature,
        string $status,
        mixed $revokedAt = null,
        ?string $userNotificationEmail = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->creditor = $creditor;
        $obj->debtor = $debtor;
        $obj->reference = $reference;
        $obj->referenceID = $referenceID;
        $obj->signature = $signature;
        $obj->status = $status;

        null !== $revokedAt && $obj->revokedAt = $revokedAt;
        null !== $userNotificationEmail && $obj->userNotificationEmail = $userNotificationEmail;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreditor(Creditor $creditor): self
    {
        $obj = clone $this;
        $obj->creditor = $creditor;

        return $obj;
    }

    public function withDebtor(Debtor $debtor): self
    {
        $obj = clone $this;
        $obj->debtor = $debtor;

        return $obj;
    }

    public function withReference(string $reference): self
    {
        $obj = clone $this;
        $obj->reference = $reference;

        return $obj;
    }

    public function withReferenceID(string $referenceID): self
    {
        $obj = clone $this;
        $obj->referenceID = $referenceID;

        return $obj;
    }

    public function withSignature(Signature $signature): self
    {
        $obj = clone $this;
        $obj->signature = $signature;

        return $obj;
    }

    /**
     * @param Status::* $status
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    public function withRevokedAt(mixed $revokedAt): self
    {
        $obj = clone $this;
        $obj->revokedAt = $revokedAt;

        return $obj;
    }

    public function withUserNotificationEmail(
        string $userNotificationEmail
    ): self {
        $obj = clone $this;
        $obj->userNotificationEmail = $userNotificationEmail;

        return $obj;
    }
}
