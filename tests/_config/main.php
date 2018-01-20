<?php

use yii2lab\domain\helpers\ConfigHelper;

return [
	'components' => [
		'geo' => ConfigHelper::normalizeItemConfig('geo', [
			'class' => 'yii2lab\geo\domain\Domain',
		]),
	],
];
