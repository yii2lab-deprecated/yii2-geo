<?php

namespace yii2lab\geo\api\controllers;

use common\enums\rbac\PermissionEnum;
use yii2lab\domain\rest\ActiveControllerWithQuery as Controller;
use yii2lab\helpers\Behavior;

class RegionController extends Controller
{
	
	public $serviceName = 'geo.region';

	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [
			'authenticator' => Behavior::apiAuth(['create', 'update', 'delete']),
			'access' => Behavior::access(PermissionEnum::GEO_REGION_MANAGE, ['create', 'update', 'delete']),
			'cors' => Behavior::cors(),
		];
	}
	
}
