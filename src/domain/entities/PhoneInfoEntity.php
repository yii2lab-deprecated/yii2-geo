<?php

namespace yii2lab\geo\domain\entities;

use yii2lab\domain\BaseEntity;

/**
 * Class PhoneEntity
 * 
 * @package yii2lab\geo\domain\entities
 *
 * @property $id
 * @property $country
 * @property $provider
 * @property $client
 */
class PhoneInfoEntity extends BaseEntity {
	
	protected $id;
	protected $country;
	protected $provider;
	protected $client;
	
	public function fieldType() {
		return [
			'id' => 'string',
			'country' => 'integer',
			'provider' => 'integer',
			'client' => 'integer',
			//'format' => ,
		];
	}
}
