<?php

namespace Otisz\Billingo\Enums;

use ArchTech\Enums\Names;
use ArchTech\Enums\Options;
use ArchTech\Enums\Values;

enum TemplateLanguages: string
{
    use Names;
    use Values;
    use Options;

    case DE = 'de';
    case EN = 'en';
    case FR = 'fr';
    case HR = 'hr';
    case HU = 'hu';
    case IT = 'it';
    case RO = 'ro';
    case SK = 'sk';
    case US = 'us';
}
