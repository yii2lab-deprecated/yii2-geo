<?php

namespace yii2lab\geo\api\controllers;

use common\enums\rbac\PermissionEnum;
use yii2lab\rest\domain\rest\ActiveControllerWithQuery as Controller;
use yii2lab\helpers\Behavior;

class CountryController extends Controller
{
	
	public $service = 'geo.country';

	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [
			'authenticator' => Behavior::apiAuth(['create', 'update', 'delete']),
			'access' => Behavior::access(PermissionEnum::GEO_COUNTRY_MANAGE, ['create', 'update', 'delete']),
			'cors' => Behavior::cors(),
		];
	}
	
}
