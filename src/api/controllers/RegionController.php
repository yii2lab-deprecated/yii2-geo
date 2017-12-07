<?php

namespace yii2lab\geo\api\controllers;

use common\enums\rbac\PermissionEnum;
use yii2lab\domain\rest\ActiveControllerWithQuery as Controller;

class RegionController extends Controller
{
	
	public $serviceName = 'geo.region';

	public function format() {
		return [
			'country' => [
				'date_change' => 'time:api',
			],
			'cities' => [
				'date_change' => 'time:api',
			],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [
			'authenticator' => [
				'class' => 'yii2woop\account\domain\filters\auth\HttpTokenAuth',
				'only' => ['create', 'update', 'delete'],
			],
			'access' => [
				'class' => 'yii\filters\AccessControl',
				'only' => ['create', 'update', 'delete'],
				'rules' => [
					[
						'allow' => true,
						'roles' => [PermissionEnum::GEO_REGION_MANAGE],
					],
				],
			],
		];
	}
	
}
