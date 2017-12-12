<?php
namespace yii2lab\geo\domain\models;

use yii\db\ActiveRecord;

class Country extends ActiveRecord 
{

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%geo_country}}';
	}
	
	public function extraFields()
	{
		return ['currency', /*'cities', 'regions'*/];
	}
	
	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCurrency()
	{
		return $this->hasOne(Currency::className(), ['country_id' => 'id']);
	}
	
	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCities()
	{
		return $this->hasMany(City::className(), ['country_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getRegions()
	{
		return $this->hasMany(Region::className(), ['country_id' => 'id']);
	}
}
