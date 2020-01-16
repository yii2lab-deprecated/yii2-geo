<?php

namespace yii2lab\geo\admin\forms;

use Yii;
use yii2lab\domain\base\Model;

class PhoneForm extends Model {

	public $country_id;
	public $mask;
	public $rule;

	public function attributeLabels()
	{
		return [
			'country_id' => Yii::t('geo/phone', 'country_id'),
			'mask' => Yii::t('geo/phone', 'mask'),
			'rule' => Yii::t('geo/phone', 'rule'),
		];
	}
	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['country_id'], 'required'],
			[['country_id'], 'default', 'value' => null],
			[['country_id'], 'integer'],
			[['mask', 'rule'], 'string'],
		];
	}
}
