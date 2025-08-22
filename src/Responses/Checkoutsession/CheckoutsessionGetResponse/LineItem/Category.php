<?php

declare(strict_types=1);

namespace Getivy\Responses\Checkoutsession\CheckoutsessionGetResponse\LineItem;

use Getivy\Core\Concerns\SdkEnum;
use Getivy\Core\Conversion\Contracts\ConverterSource;

final class Category implements ConverterSource
{
    use SdkEnum;

    public const CATEGORY_5045 = '5045';

    public const CATEGORY_5065 = '5065';

    public const CATEGORY_5094 = '5094';

    public const CATEGORY_5192 = '5192';

    public const CATEGORY_5193 = '5193';

    public const CATEGORY_5499 = '5499';

    public const CATEGORY_5655 = '5655';

    public const CATEGORY_5691 = '5691';

    public const CATEGORY_5712 = '5712';

    public const CATEGORY_5722 = '5722';

    public const CATEGORY_5812 = '5812';

    public const CATEGORY_5814 = '5814';

    public const CATEGORY_5912 = '5912';

    public const CATEGORY_5977 = '5977';

    public const CATEGORY_5999 = '5999';

    public const CATEGORY_7629 = '7629';
}
