<?php
namespace yii2lab\geo\domain\modelsDeco;

use yii2lab\helpers\Helper;
use yii2lab\geo\domain\models\Country as BaseCountry;
use yii\behaviors\AttributeTypecastBehavior;

class Country extends BaseCountry
{
	
	public function behaviors()
	{
		$behaviors = parent::behaviors();
		$behaviors['typecast'] = [
			'class' => AttributeTypecastBehavior::className(),
			'attributeTypes' => [
				'code' => AttributeTypecastBehavior::TYPE_INTEGER,
				'code_curr' => AttributeTypecastBehavior::TYPE_INTEGER,
			],
			'typecastAfterFind' => true,
		];
		return $behaviors;
	}
	
	public function fields()
	{
		$fields = parent::fields();
		$fields['date_change'] = function () {
			return Helper::timeForApi($this->date_change);
		};
		return $fields;
	}
	
}
