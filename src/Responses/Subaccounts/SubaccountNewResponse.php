<?php

declare(strict_types=1);

namespace Getivy\Responses\Subaccounts;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Subaccounts\SubaccountNewResponse\Status;

final class SubaccountNewResponse implements BaseModel
{
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public mixed $createdAt;

    #[Api]
    public string $legalName;

    #[Api]
    public string $mcc;

    #[Api('ownerId')]
    public mixed $ownerID;

    /** @var Status::* $status */
    #[Api(enum: Status::class)]
    public string $status;

    #[Api]
    public mixed $updatedAt;

    #[Api('websiteUrl', optional: true)]
    public ?string $websiteURL;

    /**
     * `new SubaccountNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubaccountNewResponse::with(
     *   id: ...,
     *   createdAt: ...,
     *   legalName: ...,
     *   mcc: ...,
     *   ownerID: ...,
     *   status: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubaccountNewResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withLegalName(...)
     *   ->withMcc(...)
     *   ->withOwnerID(...)
     *   ->withStatus(...)
     *   ->withUpdatedAt(...)
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
        mixed $createdAt,
        string $legalName,
        string $mcc,
        mixed $ownerID,
        string $status,
        mixed $updatedAt,
        ?string $websiteURL = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->legalName = $legalName;
        $obj->mcc = $mcc;
        $obj->ownerID = $ownerID;
        $obj->status = $status;
        $obj->updatedAt = $updatedAt;

        null !== $websiteURL && $obj->websiteURL = $websiteURL;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreatedAt(mixed $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withLegalName(string $legalName): self
    {
        $obj = clone $this;
        $obj->legalName = $legalName;

        return $obj;
    }

    public function withMcc(string $mcc): self
    {
        $obj = clone $this;
        $obj->mcc = $mcc;

        return $obj;
    }

    public function withOwnerID(mixed $ownerID): self
    {
        $obj = clone $this;
        $obj->ownerID = $ownerID;

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

    public function withUpdatedAt(mixed $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withWebsiteURL(string $websiteURL): self
    {
        $obj = clone $this;
        $obj->websiteURL = $websiteURL;

        return $obj;
    }
}
