<?php

namespace tests\unit\services;

use Codeception\Test\Unit;
use UnitTester;
use Yii;
use yii2lab\domain\BaseEntity;
use yii2lab\domain\data\Query;
use yii2lab\geo\domain\fixtures\GeoCityFixture;
use yii2lab\geo\domain\fixtures\GeoCountryFixture;
use yii2lab\geo\domain\fixtures\GeoCurrencyFixture;
use yii2lab\geo\domain\fixtures\GeoRegionFixture;

/**
 * Class ArticleTest
 *
 * @package yii2lab\domain\tests\unit\services
 *
 * @property UnitTester $tester
 */
class CityTest extends Unit
{
	
	public function _before()
    {
        $this->tester->haveFixtures([
	        [
		        'class' => GeoCityFixture::className(),
		        //'dataFile' => '@tests/_fixtures/data/user.php'
	        ],
	        [
		        'class' => GeoRegionFixture::className(),
		        //'dataFile' => '@tests/_fixtures/data/user.php'
	        ],
	        [
		        'class' => GeoCountryFixture::className(),
		        //'dataFile' => '@tests/_fixtures/data/user.php'
	        ],
        	[
                'class' => GeoCurrencyFixture::className(),
                //'dataFile' => '@tests/_fixtures/data/user.php'
            ],
        ]);
    }
    
	public function testAllWithRelations()
	{
		
		/** @var BaseEntity $collection */
		$query = Query::forge();
		$query->with('region.cities.country.currency');
		$query->with('region.cities.region');
		$query->with('region.country.currency');
		$query->with('country.currency');
		$query->where('id', 1896);
		$query->limit(1);
		/** @var array $collection */
		$collection = Yii::$app->geo->city->all($query);
		
		$this->tester->assertCollection([
			[
				'id' => 1896,
				'country_id' => 1894,
				'region_id' => 1895,
				'country' => [
					'id' => 1894,
					'currency' => [
						'id' => 1,
						'country_id' => 1894,
						'code' => 'KZT',
					],
				],
				'region' => [
					'id' => 1895,
					'country_id' => 1894,
					'country' => [
						'id' => 1894,
						'currency' => [
							'id' => 1,
							'country_id' => 1894,
							'code' => 'KZT',
						],
					],
					'cities' => [
						[
							'id' => '1896',
							'country_id' => '1894',
							'region_id' => '1895',
							'country' => [
								'id' => 1894,
								'currency' => [
									'id' => 1,
									'country_id' => 1894,
									'code' => 'KZT',
								],
							],
							'region' => [
								'id' => 1895,
								'country_id' => 1894,
							],
						],
					],
				],
			]
			
		], $collection);
	}
	
}
