<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderGetResponse;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Orders\OrderGetResponse\Mandate\AdditionalDisplayInformation;
use Getivy\Responses\Orders\OrderGetResponse\Mandate\Creditor;

final class Mandate implements BaseModel
{
    use SdkModel;

    #[Api]
    public string $accountHolderName;

    #[Api(optional: true)]
    public ?AdditionalDisplayInformation $additionalDisplayInformation;

    #[Api(optional: true)]
    public ?Creditor $creditor;

    #[Api(optional: true)]
    public ?string $reference;

    #[Api('referenceId', optional: true)]
    public ?string $referenceID;

    #[Api(optional: true)]
    public ?bool $setup;

    #[Api(optional: true)]
    public ?string $userNotificationEmail;

    /**
     * `new Mandate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Mandate::with(accountHolderName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Mandate)->withAccountHolderName(...)
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
     */
    public static function with(
        string $accountHolderName,
        ?AdditionalDisplayInformation $additionalDisplayInformation = null,
        ?Creditor $creditor = null,
        ?string $reference = null,
        ?string $referenceID = null,
        ?bool $setup = null,
        ?string $userNotificationEmail = null,
    ): self {
        $obj = new self;

        $obj->accountHolderName = $accountHolderName;

        null !== $additionalDisplayInformation && $obj->additionalDisplayInformation = $additionalDisplayInformation;
        null !== $creditor && $obj->creditor = $creditor;
        null !== $reference && $obj->reference = $reference;
        null !== $referenceID && $obj->referenceID = $referenceID;
        null !== $setup && $obj->setup = $setup;
        null !== $userNotificationEmail && $obj->userNotificationEmail = $userNotificationEmail;

        return $obj;
    }

    public function withAccountHolderName(string $accountHolderName): self
    {
        $obj = clone $this;
        $obj->accountHolderName = $accountHolderName;

        return $obj;
    }

    public function withAdditionalDisplayInformation(
        AdditionalDisplayInformation $additionalDisplayInformation
    ): self {
        $obj = clone $this;
        $obj->additionalDisplayInformation = $additionalDisplayInformation;

        return $obj;
    }

    public function withCreditor(Creditor $creditor): self
    {
        $obj = clone $this;
        $obj->creditor = $creditor;

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

    public function withSetup(bool $setup): self
    {
        $obj = clone $this;
        $obj->setup = $setup;

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
