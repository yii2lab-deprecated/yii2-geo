<?php

namespace yii2lab\geo\domain\entities;

use yii2lab\domain\BaseEntity;

class CurrencyEntity extends BaseEntity {
	
	protected $code;
	protected $symb_def;
	protected $name_cur;
	protected $descr;
	protected $country;

	public function rules() {
		return [
			[['code', 'symb_def', 'name_cur'], 'required'],
			//[['code', 'symb_def', 'name_cur'], 'unique'],
			[['symb_def', 'name_cur', 'descr'], 'trim'],
			[['symb_def', 'name_cur'], 'string', 'min' => 2],
			[['code'], 'integer'],
		];
	}
	
}