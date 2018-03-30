<?php

namespace yii2lab\geo\domain;

/**
 * Class Domain
 *
 * @package yii2lab\geo\domain
 *
 * @property \yii2lab\geo\domain\services\RegionService $region
 * @property \yii2lab\geo\domain\services\CityService $city
 * @property \yii2lab\geo\domain\services\CountryService $country
 * @property \yii2lab\geo\domain\services\CurrencyService $currency
 *
 */
class Domain extends \yii2lab\domain\Domain {
	
	public function config() {
		return [
			'repositories' => [
				'region',
				'city',
				'country',
				'currency',
			],
			'services' => [
				'region',
				'city',
				'country',
				'currency',
			],
		];
	}
	
}