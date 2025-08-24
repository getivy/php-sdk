<?php

declare(strict_types=1);

namespace Getivy\Responses\Capabilities;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Capabilities\CapabilityGetResponse\Capability;

final class CapabilityGetResponse implements BaseModel
{
    use SdkModel;

    /** @var list<Capability::*>|null $capabilities */
    #[Api(list: Capability::class, optional: true)]
    public ?array $capabilities;

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
     * @param list<Capability::*> $capabilities
     */
    public static function with(?array $capabilities = null): self
    {
        $obj = new self;

        null !== $capabilities && $obj->capabilities = $capabilities;

        return $obj;
    }

    /**
     * @param list<Capability::*> $capabilities
     */
    public function withCapabilities(array $capabilities): self
    {
        $obj = clone $this;
        $obj->capabilities = $capabilities;

        return $obj;
    }
}
