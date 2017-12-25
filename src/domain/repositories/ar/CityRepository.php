<?php

namespace yii2lab\geo\domain\repositories\ar;

use yii2lab\domain\data\Query;
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
				'type' => 'one',
				'field' => 'country_id',
				'repository' => [
					'id' => 'geo.country',
					'field' => 'id',
				],
			],
			'region' => [
				'type' => 'one',
				'field' => 'region_id',
				'repository' => [
					'id' => 'geo.region',
					'field' => 'id',
				],
			],
		];
	}
	
	public function allByRegionId($regionId) {
		$query = new Query();
		$query->where('region_id', $regionId);
		
		return $this->all($query);
	}
	
}
