<?php

namespace Otisz\Billingo\Enums;

use ArchTech\Enums\Names;
use ArchTech\Enums\Options;
use ArchTech\Enums\Values;

enum PaymentMethods: string
{
    use Names;
    use Values;
    use Options;

    case ARUHITEL = 'aruhitel';
    case BANKCARD = 'bankcard';
    case BARION = 'barion';
    case BARTER = 'barter';
    case CASH = 'cash';
    case CASH_ON_DELIVERY = 'cash_on_delivery';
    case COUPON = 'coupon';
    case ELORE_UTALAS = 'elore_utalas';
    case EP_KARTYA = 'ep_kartya';
    case KOMPENZACIO = 'kompenzacio';
    case LEVONAS = 'levonas';
    case ONLINE_BANKCARD = 'online_bankcard';
    case OTHER = 'other';
    case PAYLIKE = 'paylike';
    case PAYONEER = 'payoneer';
    case PAYPAL = 'paypal';
    case PAYPAL_UTOLAG = 'paypal_utolag';
    case PAYU = 'payu';
    case PICK_PACK_PONT = 'pick_pack_pont';
    case POSTAI_CSEKK = 'postai_csekk';
    case POSTAUTALVANY = 'postautalvany';
    case SKRILL = 'skrill';
    case SZEP_CARD = 'szep_card';
    case TRANSFERWISE = 'transferwise';
    case UPWORK = 'upwork';
    case UTALVANY = 'utalvany';
    case VALTO = 'valto';
    case WIRE_TRANSFER = 'wire_transfer';
}
