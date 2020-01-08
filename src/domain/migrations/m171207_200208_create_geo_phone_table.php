<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
* Handles the creation of table `currency`.
*/
class m171207_200208_create_geo_phone_table extends Migration
{
	public $table = '{{%geo_phone}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey(),
			'country_id' => $this->integer(),
			'mask' => $this->string(),
			'rule' => $this->string(),
		];
	}
}
