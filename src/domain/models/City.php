<?php
namespace yii2lab\geo\domain\models;

use yii\db\ActiveRecord;

class City extends ActiveRecord 
{

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%geo_city}}';
	}
	
	public function extraFields()
	{
		return ['country', 'region'];
	}
	
	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCountry()
	{
		return $this->hasOne(Country::className(), ['id' => 'country_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getRegion()
	{
		return $this->hasOne(Region::className(), ['id' => 'region_id']);
	}
}
