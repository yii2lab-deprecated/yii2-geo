<?php

namespace yii2lab\geo\domain\repositories\ar;

use yii2lab\domain\repositories\ActiveArRepository;

class CurrencyRepository extends ActiveArRepository {
	
	public function tableName()
	{
		return 'geo_currency';
	}
	
	public function uniqueFields() {
		return [
			['code'],
		];
	}
	
	public function relations() {
		return [
			'country' => [
				'type' => 'one',
				'field' => 'country_id',
				'repository' => [
					'id' => 'geo.country',
					'field' => 'id',
				],
			],
		];
	}
	
}
