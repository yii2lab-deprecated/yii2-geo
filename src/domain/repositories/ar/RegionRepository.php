<?php

namespace yii2lab\geo\domain\repositories\ar;

use yii2lab\domain\repositories\ActiveArRepository;

class RegionRepository extends ActiveArRepository {
	
	public function tableName()
	{
		return 'geo_region';
	}
	
	public function uniqueFields() {
        return [
            ['name'],
        ];
    }
	
	public function relations() {
		return [
			'cities' => [
				'type' => 'all',
				'field' => 'id',
				'repository' => [
					'id' => 'geo.city',
					'field' => 'region_id',
				],
			],
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
