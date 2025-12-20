<?php

namespace App\Libraries;

class PropertyParameters
{
    const WITHOUT_PREPAYMENT = 'without_prepayment';
    const BY_PREPAYMENT_AGREEMENT = 'by_prepayment_agreement';
    const TWO_WEEKS = 'two_weeks';
    const THREE_WEEKS = 'three_weeks';
    const ONE_MONTH = 'one_month';
    const TWO_MONTH = 'two_month';
    const THREE_MONTH = 'three_month';
    const SIX_MONTH = 'six_month';

    const WITHOUT_BALCONY = 'without_balcony';
    const OPEN_BALCONY = 'open_balcony';
    const ENCLOSED_BALCONY = 'enclosed_balcony';
    const SEVERAL_BALCONIES = 'several_balconies';


    const UTILITY_PAYMENTS_INCLUDED = 'utility_payments_included';
    const UTILITY_PAYMENTS_NO_INCLUDED = 'utility_payments_no_included';
    const UTILITY_PAYMENTS_BY_AGREEMENT = 'utility_payments_by_agreement';

    const WITH_FURNITURE = 'with_furniture';
    const WITHOUT_FURNITURE = 'without_furniture';
    const PARTIAL_FURNITURE = 'partial_furniture';
    const WITH_AGREEMENT_FURNITURE = 'with_agreement_furniture';

    const VIEW_TO_THE_COURTYARD = 'view_to_the_courtyard';
    const STREET_VIEW = 'street_view';
    const CITY_VIEW = 'city_view';
    const GARDEN_VIEW = 'garden_view';

    const UNIT_SQM = 'unit_sqm';
    const UNIT_KMQ = 'unit_kmq';
    const UNIT_HEQ = 'unit_heq';

    const GARAGE_NOT_AVAILABLE = 'garage_not_available';
    const GARAGE_ONE_PLACE = 'garage_one_place';
    const GARAGE_TWO_PLACE = 'garage_two_place';
    const GARAGE_THREE_OR_MORE_PLACES = 'garage_three_or_more_places';


    const STATUS_YES = 'yes';
    const STATUS_NO = 'no';


    const BUILDING_TYPE_STONE = 'building_type_stone';
    const BUILDING_TYPE_PANEL = 'building_type_panel';
    const BUILDING_TYPE_MONOLITH = 'building_type_monolith';
    const BUILDING_TYPE_BRICK = 'building_type_brick';
    const BUILDING_TYPE_CASSETTE = 'building_type_cassette';
    const BUILDING_TYPE_WOODEN = 'building_type_wooden';


    const OUTDOOR_PARKING = 'outdoor_parking';
    const COVERED_PARKING = 'covered_parking';
    const GARAGE_PARKING = 'garage_parking';
    /**
     * @return array
     */
    public static function getPrepaymentParameters(): array
    {
        return [
            self::WITHOUT_PREPAYMENT => translate(self::WITHOUT_PREPAYMENT),
            self::BY_PREPAYMENT_AGREEMENT => translate(self::BY_PREPAYMENT_AGREEMENT),
            self::TWO_WEEKS => translate(self::TWO_WEEKS),
            self::THREE_WEEKS => translate(self::THREE_WEEKS),
            self::ONE_MONTH => translate(self::ONE_MONTH),
            self::TWO_MONTH => translate(self::TWO_MONTH),
            self::THREE_MONTH => translate(self::THREE_MONTH),
            self::SIX_MONTH => translate(self::SIX_MONTH),
        ];
    }

    /**
     * @return int[]
     */
    public static function getRooms(): array
    {
        return [
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => '5+',
        ];
    }

    /**
     * @return array
     */
    public static function getPropertyFloor(): array
    {
        $tmpFloors = [];
        for ($i = 1; $i <= 31; $i++) {
            $tmpFloors[$i] = $i;
        }
        $tmpFloors[32] = '32+';
        return $tmpFloors;
    }

    /**
     * @return array
     */
    public static function getBalcony(): array
    {
        return [
            self::WITHOUT_BALCONY => translate(self::WITHOUT_BALCONY),
            self::OPEN_BALCONY => translate(self::OPEN_BALCONY),
            self::ENCLOSED_BALCONY => translate(self::ENCLOSED_BALCONY),
            self::SEVERAL_BALCONIES => translate(self::SEVERAL_BALCONIES),
        ];
    }

    /**
     * @return array
     */
    public static function getUtilityPayments(): array
    {

        return [
            self::UTILITY_PAYMENTS_INCLUDED => translate(self::UTILITY_PAYMENTS_INCLUDED),
            self::UTILITY_PAYMENTS_NO_INCLUDED => translate(self::UTILITY_PAYMENTS_NO_INCLUDED),
            self::UTILITY_PAYMENTS_BY_AGREEMENT => translate(self::UTILITY_PAYMENTS_BY_AGREEMENT),
        ];
    }


    /**
     * @return array
     */
    public static function getFurniture(): array
    {
        return [
            self::WITH_FURNITURE => translate(self::WITH_FURNITURE),
            self::WITHOUT_FURNITURE => translate(self::WITHOUT_FURNITURE),
            self::PARTIAL_FURNITURE => translate(self::PARTIAL_FURNITURE),
            self::WITH_AGREEMENT_FURNITURE => translate(self::WITH_AGREEMENT_FURNITURE),
        ];
    }

    /**
     * @return array
     */
    public static function getViewsFromWindows(): array
    {
        return [
            self::VIEW_TO_THE_COURTYARD => translate(self::VIEW_TO_THE_COURTYARD),
            self::STREET_VIEW => translate(self::STREET_VIEW),
            self::CITY_VIEW => translate(self::CITY_VIEW),
            self::GARDEN_VIEW => translate(self::GARDEN_VIEW),
        ];
    }

    /**
     * @return array
     */
    public static function getAreaUnits(): array
    {
        return [
            self::UNIT_SQM => translate(self::UNIT_SQM),
            self::UNIT_KMQ => translate(self::UNIT_KMQ),
            self::UNIT_HEQ => translate(self::UNIT_HEQ),
        ];
    }

    /**
     * @return int[]
     */
    public static function getBadRooms(): array
    {
        return [
            1 => 1,
            2 => 2,
            3 => '3+',
        ];
    }

    /**
     * @return int[]
     */
    public static function getBathRooms(): array
    {
        return [
            1 => 1,
            2 => 2,
            3 => '3+',
        ];
    }

    /**
     * @return int[]
     */
    public static function getGarages(): array
    {
        return [
            self::GARAGE_NOT_AVAILABLE => translate(self::GARAGE_NOT_AVAILABLE),
            self::GARAGE_ONE_PLACE => translate(self::GARAGE_ONE_PLACE),
            self::GARAGE_TWO_PLACE => translate(self::GARAGE_TWO_PLACE),
            self::GARAGE_THREE_OR_MORE_PLACES => translate(self::GARAGE_THREE_OR_MORE_PLACES),
        ];
    }

    /**
     * @return array
     */
    public static function getBuildYears(): array
    {
        $years = [];
        for ($i = date('Y'); $i >= 1950; $i--) {
            $years[$i] = $i;
        }

        return $years;
    }

    /**
     * @return array
     */
    public static function getYesNo(): array
    {
        return [
            self::STATUS_YES => translate(self::STATUS_YES),
            self::STATUS_NO => translate(self::STATUS_NO),
        ];
    }

    /**
     * @return array
     */
    public static function getBuildingType(): array
    {
        return [
            self::BUILDING_TYPE_STONE => translate(self::BUILDING_TYPE_STONE),
            self::BUILDING_TYPE_PANEL => translate(self::BUILDING_TYPE_PANEL),
            self::BUILDING_TYPE_MONOLITH => translate(self::BUILDING_TYPE_MONOLITH),
            self::BUILDING_TYPE_BRICK => translate(self::BUILDING_TYPE_BRICK),
            self::BUILDING_TYPE_CASSETTE => translate(self::BUILDING_TYPE_CASSETTE),
            self::BUILDING_TYPE_WOODEN => translate(self::BUILDING_TYPE_WOODEN),
        ];
    }

    /**
     * @return array
     */
    public static function getParkingParams(): array
    {
        return [
            self::OUTDOOR_PARKING => translate(self::OUTDOOR_PARKING),
            self::COVERED_PARKING => translate(self::COVERED_PARKING),
            self::GARAGE_PARKING => translate(self::GARAGE_PARKING),
        ];
    }
}