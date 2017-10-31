<?php

namespace yii2lab\geo\domain\entities;

use yii2lab\domain\BaseEntity;

class RegionEntity extends BaseEntity {
	
	protected $id;
	protected $country_id;
	protected $title;
	protected $country;
	protected $cities;
	
	public function rules() {
		return [
			[['title'], 'trim'],
			[['title', 'country_id'], 'required'],
			[['country_id'], 'integer'],
		];
	}
	
}