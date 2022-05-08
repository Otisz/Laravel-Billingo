<?php

namespace Otisz\Billingo\Enums;

use ArchTech\Enums\Names;
use ArchTech\Enums\Options;
use ArchTech\Enums\Values;

enum DiscountTypes: string
{
    use Names;
    use Values;
    use Options;

    case PERCENT = 'percent';
}
