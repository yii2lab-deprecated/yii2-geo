<?php

use yii2lab\migration\db\MigrationCreateTable as Migration;

/**
* Handles the creation of table `currency`.
*/
class m170505_160208_create_geo_currency_table extends Migration
{
	public $table = '{{%geo_currency}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey(),
			'country_id' => $this->integer(),
			'code' => $this->string(3),
			'name' => $this->string(45),
			'description' => $this->string(255),
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
