<?php

namespace Otisz\Billingo\Enums;

use ArchTech\Enums\Names;
use ArchTech\Enums\Options;
use ArchTech\Enums\Values;

enum Entitlements: string
{
    use Names;
    use Values;
    use Options;

    case AAM = 'AAM';
    case ANTIQUES = 'ANTIQUES';
    case ARTWORK = 'ARTWORK';
    case ATK = 'ATK';
    case EAM = 'EAM';
    case EUE = 'EUE';
    case EUFAD37 = 'EUFAD37';
    case EUFADE = 'EUFADE';
    case HO = 'HO';
    case KBAET = 'KBAET';
    case NAM_1 = 'NAM_1';
    case NAM_2 = 'NAM_2';
    case SECOND_HAND = 'SECOND_HAND';
    case TAM = 'TAM';
    case TRAVEL_AGENCY = 'TRAVEL_AGENCY';

    public function comment(): string
    {
        return match ($this) {
            self::AAM => 'Alanyi adómentesség',
            self::ANTIQUES => 'Különbözet szerinti szabályozás - gyűjteménydarabok és régiségek -',
            self::ARTWORK => 'Különbözet szerinti szabályozás - műalkotások -',
            self::ATK => 'Áfa tv. tárgyi hatályán kívüli ügylet',
            self::EAM => 'Áfamentes termékexport, azzal egy tekintet alá eső értékesítések, nemzetközi közlekedéshez kapcsolódó áfamentes ügyletek (Áfa tv. 98-109. §)',
            self::EUE => 'EU más tagállamában áfaköteles (áfa fizetésére az értékesítő köteles)',
            self::EUFAD37 => 'Áfa tv. 37. § (1) bekezdése alapján a szolgáltatás teljesítése helye az EU más tagállama (áfa fizetésére a vevő köteles)',
            self::EUFADE => 'Áfa tv. egyéb rendelkezése szerint a teljesítés helye EU más tagállama (áfa fizetésére a vevő kötelezett)',
            self::HO => 'Áfa tv. szerint EU-n kívül teljesített ügylet',
            self::KBAET => 'Más tagállamba irányuló áfamentes termékértékesítés (Áfa tv. 89. §)',
            self::NAM_1 => 'Áfamentes közvetítői tevékenység (Áfa tv. 110. §)',
            self::NAM_2 => 'Termékek nemzetközi forgalmához kapcsolódó áfamentes ügylet (Áfa tv. 111-118. §)',
            self::SECOND_HAND => 'Különbözet szerinti szabályozás - használt cikkek -',
            self::TAM => 'Tevékenység közérdekű jellegére vagy egyéb sajátos jellegére tekintettel áfamentes (Áfa tv. 85-87.§)',
            self::TRAVEL_AGENCY => 'Különbözet szerinti szabályozás - utazási irodák -',
        };
    }

    public static function comments(): array
    {
        return [
            self::AAM->name => 'Alanyi adómentesség',
            self::ANTIQUES->name => 'Különbözet szerinti szabályozás - gyűjteménydarabok és régiségek -',
            self::ARTWORK->name => 'Különbözet szerinti szabályozás - műalkotások -',
            self::ATK->name => 'Áfa tv. tárgyi hatályán kívüli ügylet',
            self::EAM->name => 'Áfamentes termékexport, azzal egy tekintet alá eső értékesítések, nemzetközi közlekedéshez kapcsolódó áfamentes ügyletek (Áfa tv. 98-109. §)',
            self::EUE->name => 'EU más tagállamában áfaköteles (áfa fizetésére az értékesítő köteles)',
            self::EUFAD37->name => 'Áfa tv. 37. § (1) bekezdése alapján a szolgáltatás teljesítése helye az EU más tagállama (áfa fizetésére a vevő köteles)',
            self::EUFADE->name => 'Áfa tv. egyéb rendelkezése szerint a teljesítés helye EU más tagállama (áfa fizetésére a vevő kötelezett)',
            self::HO->name => 'Áfa tv. szerint EU-n kívül teljesített ügylet',
            self::KBAET->name => 'Más tagállamba irányuló áfamentes termékértékesítés (Áfa tv. 89. §)',
            self::NAM_1->name => 'Áfamentes közvetítői tevékenység (Áfa tv. 110. §)',
            self::NAM_2->name => 'Termékek nemzetközi forgalmához kapcsolódó áfamentes ügylet (Áfa tv. 111-118. §)',
            self::SECOND_HAND->name => 'Különbözet szerinti szabályozás - használt cikkek -',
            self::TAM->name => 'Tevékenység közérdekű jellegére vagy egyéb sajátos jellegére tekintettel áfamentes (Áfa tv. 85-87.§)',
            self::TRAVEL_AGENCY->name => 'Különbözet szerinti szabályozás - utazási irodák -',
        ];
    }
}
