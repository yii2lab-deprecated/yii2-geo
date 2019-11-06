<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
* Handles the creation of table `city`.
*/
class m171207_114919_create_geo_city_table extends Migration
{
	public $table = '{{%geo_city}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey(),
			'country_id' => $this->integer(),
			'region_id' => $this->integer(),
			'name' => $this->string(128),
		];
	}


}
