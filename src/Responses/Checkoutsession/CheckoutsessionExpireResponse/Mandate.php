<?php

declare(strict_types=1);

namespace Getivy\Responses\Checkoutsession\CheckoutsessionExpireResponse;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Checkoutsession\CheckoutsessionExpireResponse\Mandate\AdditionalDisplayInformation;

final class Mandate implements BaseModel
{
    use SdkModel;

    #[Api(optional: true)]
    public ?string $accountHolderName;

    #[Api(optional: true)]
    public ?AdditionalDisplayInformation $additionalDisplayInformation;

    #[Api('referenceId', optional: true)]
    public ?string $referenceID;

    #[Api(optional: true)]
    public ?bool $setup;

    #[Api(optional: true)]
    public ?string $userNotificationEmail;

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
        ?string $accountHolderName = null,
        ?AdditionalDisplayInformation $additionalDisplayInformation = null,
        ?string $referenceID = null,
        ?bool $setup = null,
        ?string $userNotificationEmail = null,
    ): self {
        $obj = new self;

        null !== $accountHolderName && $obj->accountHolderName = $accountHolderName;
        null !== $additionalDisplayInformation && $obj->additionalDisplayInformation = $additionalDisplayInformation;
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
