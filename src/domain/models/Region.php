<?php
namespace yii2lab\geo\domain\models;

use yii\db\ActiveRecord;

class Region extends ActiveRecord 
{

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%geo_region}}';
	}
	
	public function extraFields()
	{
		return ['country'/*, 'cities'*/];
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
	public function getCities()
	{
		return $this->hasMany(City::className(), ['region_id' => 'id']);
	}
	
}
