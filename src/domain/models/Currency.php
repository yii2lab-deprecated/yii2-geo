<?php
namespace yii2lab\geo\domain\models;

use yii\db\ActiveRecord;

class Currency extends ActiveRecord 
{

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%geo_currency}}';
	}
	
	public function extraFields()
	{
		return ['country'];
	}
	
	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCountry()
	{
		return $this->hasOne(Country::className(), ['id' => 'country_id']);
	}
	
}
