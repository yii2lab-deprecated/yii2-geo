<?php

namespace yii2lab\geo\domain\repositories\ar;

use yii2lab\domain\data\Query;
use yii2lab\domain\repositories\ActiveArRepository;

class CityRepository extends ActiveArRepository {
	
	public function uniqueFields() {
		return [
			['city_name'],
		];
	}
	
	public function allByRegionId($regionId) {
		$query = new Query();
		$query->where('region_id', $regionId);
		
		return $this->all($query);
	}
	
}
