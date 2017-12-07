<?php

namespace yii2lab\geo\api\controllers;

use common\enums\rbac\PermissionEnum;
use yii2lab\domain\rest\ActiveControllerWithQuery as Controller;

class CountryController extends Controller
{
	
	public $serviceName = 'geo.country';
	
	public function format() {
		return [
			'date_change' => 'time:api',
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
						'roles' => [PermissionEnum::GEO_COUNTRY_MANAGE],
					],
				],
			],
		];
	}
	
}
