<?php

namespace yii2lab\geo\domain\repositories\ar;

use yii2lab\domain\repositories\ActiveArRepository;

class CountryRepository extends ActiveArRepository {
	
	public function uniqueFields() {
		return [
			['name_short', 'name_full', 'symb_def2', 'symb_def3', 'code_curr'],
		];
	}
	
}
