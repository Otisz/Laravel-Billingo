<?php

namespace Otisz\Billingo\Enums;

use ArchTech\Enums\Names;
use ArchTech\Enums\Options;
use ArchTech\Enums\Values;

enum Vats: string
{
    use Names;
    use Values;
    use Options;

    case PERCENT_0 = '0%';
    case PERCENT_1 = '1%';
    case PERCENT_2 = '2%';
    case PERCENT_3 = '3%';
    case PERCENT_4 = '4%';
    case PERCENT_5 = '5%';
    case PERCENT_6 = '6%';
    case PERCENT_7 = '7%';
    case PERCENT_8 = '8%';
    case PERCENT_9 = '9%';
    case PERCENT_10 = '10%';
    case PERCENT_11 = '11%';
    case PERCENT_12 = '12%';
    case PERCENT_13 = '13%';
    case PERCENT_14 = '14%';
    case PERCENT_15 = '15%';
    case PERCENT_16 = '16%';
    case PERCENT_17 = '17%';
    case PERCENT_18 = '18%';
    case PERCENT_19 = '19%';
    case PERCENT_20 = '20%';
    case PERCENT_21 = '21%';
    case PERCENT_22 = '22%';
    case PERCENT_23 = '23%';
    case PERCENT_24 = '24%';
    case PERCENT_25 = '25%';
    case PERCENT_26 = '26%';
    case PERCENT_27 = '27%';
    case PERCENT_55 = '55%';
    case PERCENT_77 = '77%';
    case PERCENT_95 = '95%';
    case AAM = 'AAM';
    case AM = 'AM';
    case EU = 'EU';
    case EUK = 'EUK';
    case F_AFA = 'F.AFA';
    case FAD = 'FAD';
    case K_AFA = 'K.AFA';
    case MAA = 'MAA';
    case TAM = 'TAM';
    case AKK = 'ÁKK';
    case ATHK = 'ÁTHK';
}
