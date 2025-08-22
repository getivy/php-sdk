<?php

declare(strict_types=1);

namespace Getivy\Responses\Data\Consent;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Core\Conversion\ListOf;
use Getivy\Responses\Data\Consent\ConsentRevokeResponse\Permission;
use Getivy\Responses\Data\Consent\ConsentRevokeResponse\Status;

final class ConsentRevokeResponse implements BaseModel
{
    use SdkModel;

    /**
     * The Epoch time in seconds when the consent was created.
     */
    #[Api]
    public float $createdAt;

    /**
     * The permissions granted in this consent.
     *
     * @var list<Permission::*> $permissions
     */
    #[Api(type: new ListOf(enum: Permission::class))]
    public array $permissions;

    /**
     * The Epoch time in seconds at which the consent was revoked.
     */
    #[Api]
    public float $revokedAt;

    /**
     * The current status of the consent.
     *
     * @var Status::* $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * The Epoch time in seconds when the consent was last updated.
     */
    #[Api]
    public float $updatedAt;

    /**
     * The Epoch time in seconds at which the consent expires.
     */
    #[Api(optional: true)]
    public ?float $expiresAt;

    /**
     * `new ConsentRevokeResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConsentRevokeResponse::with(
     *   createdAt: ..., permissions: ..., revokedAt: ..., status: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConsentRevokeResponse)
     *   ->withCreatedAt(...)
     *   ->withPermissions(...)
     *   ->withRevokedAt(...)
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
     * @param list<Permission::*> $permissions
     * @param Status::* $status
     */
    public static function with(
        float $createdAt,
        array $permissions,
        float $revokedAt,
        string $status,
        float $updatedAt,
        ?float $expiresAt = null,
    ): self {
        $obj = new self;

        $obj->createdAt = $createdAt;
        $obj->permissions = $permissions;
        $obj->revokedAt = $revokedAt;
        $obj->status = $status;
        $obj->updatedAt = $updatedAt;

        null !== $expiresAt && $obj->expiresAt = $expiresAt;

        return $obj;
    }

    /**
     * The Epoch time in seconds when the consent was created.
     */
    public function withCreatedAt(float $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The permissions granted in this consent.
     *
     * @param list<Permission::*> $permissions
     */
    public function withPermissions(array $permissions): self
    {
        $obj = clone $this;
        $obj->permissions = $permissions;

        return $obj;
    }

    /**
     * The Epoch time in seconds at which the consent was revoked.
     */
    public function withRevokedAt(float $revokedAt): self
    {
        $obj = clone $this;
        $obj->revokedAt = $revokedAt;

        return $obj;
    }

    /**
     * The current status of the consent.
     *
     * @param Status::* $status
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * The Epoch time in seconds when the consent was last updated.
     */
    public function withUpdatedAt(float $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * The Epoch time in seconds at which the consent expires.
     */
    public function withExpiresAt(float $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }
}
