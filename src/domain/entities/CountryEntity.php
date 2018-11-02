<?php

namespace yii2lab\geo\domain\entities;

use yii2lab\domain\BaseEntity;

class CountryEntity extends BaseEntity {
	
	protected $id;
    protected $name;
    protected $currency;
	protected $phone;
    //protected $cities;
    //protected $regions;

	public function rules() {
		return [
			[['id', 'name'], 'required'],
			[['name'], 'trim'],
			[['name'], 'string', 'min' => 2],
			[['id'], 'integer'],
		];
	}
	
	public function fieldType() {
		return [
			'id' => 'integer',
			'currency' => CurrencyEntity::class,
			'phone' => PhoneEntity::class,
		];
	}
}