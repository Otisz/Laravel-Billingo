<?php

namespace Otisz\Billingo\Traits;

trait HasStaticData
{
    /**
     * @return array|string[]
     */
    public function currencyList(): array
    {
        return [
            'AUD', 'BGN', 'BRL', 'CAD', 'CHF', 'CNY', 'CZK', 'DKK', 'EUR', 'GBP', 'HKD', 'HRK', 'HUF', 'IDR', 'ILS',
            'INR', 'ISK', 'JPY', 'KRW', 'LTL', 'LVL', 'MXN', 'MYR', 'NOK', 'NZD', 'PHP', 'PLN', 'RON', 'RSD', 'RUB',
            'SEK', 'SGD', 'THB', 'TRY', 'UAH', 'USD', 'ZAR',
        ];
    }

    /**
     * @return array|string[]
     */
    public function paymentMethods(): array
    {
        return [
            'aruhitel', 'bankcard', 'barion', 'barter', 'cash', 'cash_on_delivery', 'coupon', 'elore_utalas',
            'ep_kartya', 'kompenzacio', 'levonas', 'online_bankcard', 'payoneer', 'paypal', 'paypal_utolag', 'payu',
            'pick_pack_pont', 'postai_csekk', 'postautalvany', 'skrill', 'szep_card', 'transferwise', 'upwork',
            'utalvany', 'valto', 'wire_transfer',
        ];
    }

    /**
     * @return array|string[]
     */
    public function paymentStatuses(): array
    {
        return [
            'expired', 'none', 'outstanding', 'paid', 'partially_paid',
        ];
    }

    /**
     * @return array|string[]
     */
    public function vats(): array
    {
        return [
            '0%', '1%', '2%', '3%', '4%', '5%', '6%', '7%', '8%', '9%', '10%', '11%', '12%', '13%', '14%', '15%', '16%',
            '17%', '18%', '19%', '20%', '21%', '22%', '23%', '24%', '25%', '26%', '27%', 'AAM', 'AM', 'EU', 'EUK',
            'F.AFA', 'FAD', 'K.AFA', 'MAA', 'TAM', 'ÁKK', 'ÁTHK',
        ];
    }

    /**
     * @return array|string[]
     */
    public function documentStoreTypes(): array
    {
        return [
            'advance', 'draft', 'invoice', 'proforma',
        ];
    }

    /**
     * @return array|string[]
     */
    public function documentTypes(): array
    {
        return [
            'advance', 'canceled', 'cancellation', 'draft', 'invoice', 'proforma',
        ];
    }

    /**
     * @return array|string[]
     */
    public function documentLanguages(): array
    {
        return [
            'de', 'en', 'fr', 'hr', 'hu', 'it', 'ro', 'sk',
        ];
    }

    /**
     * @return array|string[]
     */
    public function countryList(): array
    {
        return [
            'AC', 'AD', 'AE', 'AF', 'AG', 'AI', 'AL', 'AM', 'AO', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AW', 'AX', 'AZ', 'BA',
            'BB', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BL', 'BM', 'BN', 'BO', 'BQ', 'BR', 'BS', 'BT', 'BW', 'BY',
            'BZ', 'CA', 'CC', 'CD', 'CF', 'CG', 'CH', 'CI', 'CK', 'CL', 'CM', 'CN', 'CO', 'CR', 'CU', 'CV', 'CW', 'CX',
            'CY', 'CZ', 'DE', 'DG', 'DJ', 'DK', 'DM', 'DO', 'DZ', 'EA', 'EC', 'EE', 'EG', 'EH', 'ER', 'ES', 'ET', 'FI',
            'FJ', 'FK', 'FM', 'FO', 'FR', 'GA', 'GB', 'GD', 'GE', 'GF', 'GG', 'GH', 'GI', 'GL', 'GM', 'GN', 'GP', 'GQ',
            'GR', 'GS', 'GT', 'GU', 'GW', 'GY', 'HK', 'HN', 'HR', 'HT', 'HU', 'IC', 'ID', 'IE', 'IL', 'IM', 'IN', 'IO',
            'IQ', 'IR', 'IS', 'IT', 'JE', 'JM', 'JO', 'JP', 'KE', 'KG', 'KH', 'KI', 'KM', 'KN', 'KP', 'KR', 'KW', 'KY',
            'KZ', 'LA', 'LB', 'LC', 'LI', 'LK', 'LR', 'LS', 'LT', 'LU', 'LV', 'LY', 'MA', 'MC', 'MD', 'ME', 'MF', 'MG',
            'MH', 'MK', 'ML', 'MM', 'MN', 'MO', 'MP', 'MQ', 'MR', 'MS', 'MT', 'MU', 'MV', 'MW', 'MX', 'MY', 'MZ', 'NA',
            'NC', 'NE', 'NF', 'NG', 'NI', 'NL', 'NO', 'NP', 'NR', 'NU', 'NZ', 'OM', 'PA', 'PE', 'PF', 'PG', 'PH', 'PK',
            'PL', 'PM', 'PN', 'PR', 'PS', 'PT', 'PW', 'PY', 'QA', 'RE', 'RO', 'RS', 'RU', 'RW', 'SA', 'SB', 'SC', 'SD',
            'SE', 'SG', 'SH', 'SI', 'SJ', 'SK', 'SL', 'SM', 'SN', 'SO', 'SR', 'SS', 'ST', 'SV', 'SX', 'SY', 'SZ', 'TA',
            'TC', 'TD', 'TF', 'TG', 'TH', 'TJ', 'TK', 'TL', 'TM', 'TN', 'TO', 'TR', 'TT', 'TV', 'TW', 'TZ', 'UA', 'UG',
            'UM', 'US', 'UY', 'UZ', 'VA', 'VC', 'VE', 'VG', 'VI', 'VN', 'VU', 'WF', 'WS', 'XA', 'XB', 'XK', 'YE', 'YT',
            'ZA', 'ZM', 'ZW',
        ];
    }
}
