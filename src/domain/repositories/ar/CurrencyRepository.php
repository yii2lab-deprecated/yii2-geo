<?php

namespace yii2lab\geo\domain\repositories\ar;

use yii2lab\domain\repositories\ActiveArRepository;

class CurrencyRepository extends ActiveArRepository {
	
	public function uniqueFields() {
		return [
			['symb_def'],
		];
	}
	
}
