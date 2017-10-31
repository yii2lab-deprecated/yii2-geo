<?php

namespace yii2lab\geo\api\controllers;

use yii2lab\domain\rest\ActiveControllerWithQuery as Controller;

class CurrencyController extends Controller
{
	
	public $serviceName = 'geo.currency';
	
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
						'roles' => ['geo.currency.manage'],
					],
				],
			],
		];
	}
	
}
