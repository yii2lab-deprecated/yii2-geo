<?php

namespace yii2lab\geo\domain\repositories\schema;

use yii2lab\domain\enums\RelationEnum;
use yii2lab\domain\repositories\relations\BaseSchema;

/**
 * Class PhoneSchema
 * 
 * @package yii2lab\geo\domain\repositories\schema
 * 
 */
class PhoneSchema extends BaseSchema {
	
	public function relations() {
		return [
			'country' => [
				'type' => RelationEnum::ONE,
				'field' => 'country_id',
				'foreign' => [
					'id' => 'geo.country',
					'field' => 'id',
				],
			],
		];
	}
	
}
