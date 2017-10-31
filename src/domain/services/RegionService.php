<?php

namespace yii2lab\geo\domain\services;

use yii2lab\domain\data\Query;
use yii2lab\domain\services\ActiveBaseService;

class RegionService extends ActiveBaseService {
	
	//public $forbiddenChangeFields = ['active_id'];
	public $foreignServices = [
		'geo.country' => [
			'field' => 'country_id',
			'notFoundMessage' => ['active/country', 'not_found'],
		],
	];
	
	public function allByCountryId($countryId){
		$query = new Query;
		$query->where('country_id', $countryId);
		return $this->repository->all($query);
		
	}
	
	
}
