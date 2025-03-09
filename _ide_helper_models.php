<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $city_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\District> $districts
 * @property-read int|null $districts_count
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 */
	class City extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $longitude
 * @property string $latitude
 * @property int $ManagerId
 * @property int $WardId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GasStation> $gasStations
 * @property-read int|null $gas_stations_count
 * @property-read \App\Models\Manager|null $manager
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Price> $price
 * @property-read int|null $price_count
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereManagerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereWardId($value)
 */
	class Company extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $CityId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\City|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ward> $wards
 * @property-read int|null $wards_count
 * @method static \Illuminate\Database\Eloquent\Builder|District newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District query()
 * @method static \Illuminate\Database\Eloquent\Builder|District whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereUpdatedAt($value)
 */
	class District extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GasStationFuel> $gasStationFuels
 * @property-read int|null $gas_station_fuels_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Price> $price
 * @property-read int|null $price_count
 * @method static \Illuminate\Database\Eloquent\Builder|FuelType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FuelType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FuelType query()
 * @method static \Illuminate\Database\Eloquent\Builder|FuelType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FuelType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FuelType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FuelType whereUpdatedAt($value)
 */
	class FuelType extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $longitude
 * @property string $latitude
 * @property string|null $image
 * @property string $operation_time
 * @property int $CompanyId
 * @property int $WardId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GasStationFuel> $gasStationFuel
 * @property-read int|null $gas_station_fuel_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $review
 * @property-read int|null $review_count
 * @property-read \App\Models\Ward|null $ward
 * @method static \Illuminate\Database\Eloquent\Builder|GasStation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GasStation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GasStation query()
 * @method static \Illuminate\Database\Eloquent\Builder|GasStation whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStation whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStation whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStation whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStation whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStation whereOperationTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStation wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStation whereWardId($value)
 */
	class GasStation extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $GasStationId
 * @property int $FuelTypeId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\FuelType|null $fuelType
 * @property-read \App\Models\GasStation|null $gasStation
 * @method static \Illuminate\Database\Eloquent\Builder|GasStationFuel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GasStationFuel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GasStationFuel query()
 * @method static \Illuminate\Database\Eloquent\Builder|GasStationFuel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStationFuel whereFuelTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStationFuel whereGasStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStationFuel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasStationFuel whereUpdatedAt($value)
 */
	class GasStationFuel extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Company> $companies
 * @property-read int|null $companies_count
 * @method static \Illuminate\Database\Eloquent\Builder|Manager newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Manager newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Manager query()
 * @method static \Illuminate\Database\Eloquent\Builder|Manager whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Manager whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Manager whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Manager whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Manager whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Manager wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Manager whereUpdatedAt($value)
 */
	class Manager extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $price
 * @property string $start_date
 * @property int $FuelTypeId
 * @property int $CompanyId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company|null $company
 * @property-read \App\Models\FuelType|null $fuelType
 * @method static \Illuminate\Database\Eloquent\Builder|Price newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Price newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Price query()
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereFuelTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereUpdatedAt($value)
 */
	class Price extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $rating
 * @property string $content
 * @property int $GasStationId
 * @property int $UserId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\GasStation|null $gasStation
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereGasStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUserId($value)
 */
	class Review extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $CCCD
 * @property string $email
 * @property string $password
 * @property string $role
 * @property int $active
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $review
 * @property-read int|null $review_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCCCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $DistrictId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\District|null $district
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GasStation> $gasStation
 * @property-read int|null $gas_station_count
 * @method static \Illuminate\Database\Eloquent\Builder|Ward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ward newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ward query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ward whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ward whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ward whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ward whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ward whereUpdatedAt($value)
 */
	class Ward extends \Eloquent {}
}

