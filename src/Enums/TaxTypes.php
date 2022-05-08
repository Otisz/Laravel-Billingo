<?php

namespace Otisz\Billingo\Enums;

use ArchTech\Enums\Names;
use ArchTech\Enums\Options;
use ArchTech\Enums\Values;

enum TaxTypes: string
{
    use Names;
    use Values;
    use Options;

    case FOREIGN = 'FOREIGN';
    case HAS_TAX_NUMBER = 'HAS_TAX_NUMBER';
    case NO_TAX_NUMBER = 'NO_TAX_NUMBER';
}
