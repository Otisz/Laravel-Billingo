<?php

namespace Otisz\Billingo\Enums;

use ArchTech\Enums\Names;
use ArchTech\Enums\Options;
use ArchTech\Enums\Values;

enum Currencies: string
{
    use Names;
    use Values;
    use Options;

    case AED = 'AED';
    case AUD = 'AUD';
    case BGN = 'BGN';
    case BRL = 'BRL';
    case CAD = 'CAD';
    case CHF = 'CHF';
    case CNY = 'CNY';
    case CZK = 'CZK';
    case DKK = 'DKK';
    case EUR = 'EUR';
    case GBP = 'GBP';
    case HKD = 'HKD';
    case HRK = 'HRK';
    case HUF = 'HUF';
    case IDR = 'IDR';
    case ILS = 'ILS';
    case INR = 'INR';
    case ISK = 'ISK';
    case JPY = 'JPY';
    case KRW = 'KRW';
    case MXN = 'MXN';
    case MYR = 'MYR';
    case NOK = 'NOK';
    case NZD = 'NZD';
    case PHP = 'PHP';
    case PLN = 'PLN';
    case RON = 'RON';
    case RSD = 'RSD';
    case RUB = 'RUB';
    case SEK = 'SEK';
    case SGD = 'SGD';
    case THB = 'THB';
    case TRY = 'TRY';
    case UAH = 'UAH';
    case USD = 'USD';
    case ZAR = 'ZAR';
}
