<?php

namespace yii2lab\geo\domain\repositories\ar;

use yii2lab\domain\enums\RelationEnum;
use yii2lab\domain\repositories\ActiveArRepository;

class CountryRepository extends ActiveArRepository {
	
	public function tableName()
	{
		return 'geo_country';
	}
	
	public function uniqueFields() {
        return [
            ['name'],
        ];
    }
	
	public function relations() {
		return [
			'currency' => [
				'type' => RelationEnum::ONE,
				'field' => 'id',
				'foreign' => [
					'id' => 'geo.currency',
					'field' => 'country_id',
				],
			],
		];
	}
	
}
