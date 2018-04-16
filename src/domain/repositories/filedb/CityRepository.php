<?php

namespace yii2lab\geo\domain\repositories\filedb;

use yii2lab\domain\repositories\ActiveFiledbRepository;

class CityRepository extends ActiveFiledbRepository {
	
	protected $schemaClass = true;
	
	public function tableName()
	{
		return 'geo_city';
	}
	
}
