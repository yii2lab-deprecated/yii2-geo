<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
* Handles the creation of table `country`.
*/
class m171207_004915_create_geo_country_table extends Migration
{
	public $table = '{{%geo_country}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey(),
			'name' => $this->string(128),
		];
	}


}
