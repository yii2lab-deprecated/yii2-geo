<?php

use yii2lab\migration\db\MigrationCreateTable as Migration;

/**
* Handles the creation of table `region`.
*/
class m170505_104142_create_geo_region_table extends Migration
{
	public $table = '{{%geo_region}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey(),
			'country_id' => $this->integer(),
			'name' => $this->string(64),
		];
	}

	public function afterCreate()
	{
        $this->myAddForeignKey(
            'country_id',
            '{{%geo_country}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
	}

}
