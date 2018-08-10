<?php

namespace yii2lab\geo\api\controllers;

use yii2lab\geo\domain\enums\GeoPermissionEnum;
use yii2lab\rest\domain\rest\ActiveControllerWithQuery as Controller;
use yii2lab\helpers\Behavior;

class CurrencyController extends Controller
{
	
	public $service = 'geo.currency';
	
	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [
			'authenticator' => Behavior::apiAuth(['create', 'update', 'delete']),
			'access' => Behavior::access(GeoPermissionEnum::CURRENCY_MANAGE, ['create', 'update', 'delete']),
			'cors' => Behavior::cors(),
		];
	}
	
}
