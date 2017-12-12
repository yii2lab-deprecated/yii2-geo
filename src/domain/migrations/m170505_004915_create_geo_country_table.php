<?php

use yii2lab\migration\db\MigrationCreateTable as Migration;

/**
* Handles the creation of table `country`.
*/
class m170505_004915_create_geo_country_table extends Migration
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

	public function afterCreate()
	{
		//$this->myCreateIndexUnique(['name_short']);
		//$this->myCreateIndexUnique(['name_full']);
	}

}
