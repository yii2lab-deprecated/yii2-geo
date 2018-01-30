<?php

namespace yii2lab\geo\domain\repositories\ar;

use yii2lab\domain\enums\RelationEnum;
use yii2lab\domain\repositories\ActiveArRepository;

class CityRepository extends ActiveArRepository {
	
	public function tableName()
	{
		return 'geo_city';
	}
	
	public function uniqueFields() {
		return [
			['name'],
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
			'region' => [
				'type' => RelationEnum::ONE,
				'field' => 'region_id',
				'foreign' => [
					'id' => 'geo.region',
					'field' => 'id',
				],
			],
		];
	}
	
}
