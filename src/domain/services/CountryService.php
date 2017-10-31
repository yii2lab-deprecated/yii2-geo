<?php

namespace yii2lab\geo\domain\services;

use yii2lab\domain\services\ActiveBaseService;

class CountryService extends ActiveBaseService {
	
	public $foreignServices = [
		'geo.currency' => [
			'field' => 'code',
			'notFoundMessage' => ['geo/currency', 'not_found'],
			'isChild' => true,
		],
	];
	
}
