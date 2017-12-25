<?php

namespace yii2lab\geo\domain\repositories\ar;

use yii2lab\domain\enums\RelationEnum;
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
				'type' => RelationEnum::ONE,
				'field' => 'country_id',
				'foreign' => [
					'id' => 'geo.country',
					'field' => 'id',
				],
			],
		];
	}
	
}
