<?php

namespace yii2lab\geo\domain\services;

use yii2lab\domain\data\Query;
use yii2lab\domain\services\ActiveBaseService;

class CityService extends ActiveBaseService {
	
	public $foreignServices = [
		'geo.country' => [
			'field' => 'id_country',
			'notFoundMessage' => ['geo/country', 'not_found'],
		],
	];
	
	public function allByRegionId($regionId) {
		return $this->repository->allByRegionId($regionId);
	}
	
}
