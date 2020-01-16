<?php

namespace yii2lab\geo\admin\helpers;

use yii2lab\extension\menu\interfaces\MenuInterface;
use yii2lab\extension\common\helpers\ModuleHelper;

class Menu implements MenuInterface {

	public function toArray() {
		return [
			'label' => ['geo/phone', 'title'],
			'module' => 'geo',
			'items' => [
				[
					'label' => ['geo/phone', 'phone'],
					'url' => 'geo',
				],
			],
		];
	}

}
