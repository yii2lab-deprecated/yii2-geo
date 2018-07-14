<?php

namespace yii2lab\geo\api\controllers;

use common\enums\rbac\PermissionEnum;
use yii2lab\rest\domain\rest\ActiveControllerWithQuery as Controller;
use yii2lab\helpers\Behavior;

class CityController extends Controller
{
	
	public $service = 'geo.city';

	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [
			'authenticator' => Behavior::apiAuth(['create', 'update', 'delete']),
			'access' => Behavior::access(PermissionEnum::GEO_CITY_MANAGE, ['create', 'update', 'delete']),
			'cors' => Behavior::cors(),
		];
	}
	
}
