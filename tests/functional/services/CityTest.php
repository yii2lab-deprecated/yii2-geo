<?php

namespace tests\functional\services;

use yii2lab\test\Test\Unit;
use Yii;
use yii2lab\domain\BaseEntity;
use yii2lab\domain\data\Query;
use yii2lab\geo\domain\fixtures\GeoCityFixture;
use yii2lab\geo\domain\fixtures\GeoCountryFixture;
use yii2lab\geo\domain\fixtures\GeoCurrencyFixture;
use yii2lab\geo\domain\fixtures\GeoRegionFixture;

class CityTest extends Unit
{
	
	public function _before()
    {
        $this->tester->haveFixtures([
	        [
		        'class' => GeoCityFixture::class,
		        'dataFile' => 'tests/_fixtures/data/geo_city.php'
	        ],
	        [
		        'class' => GeoRegionFixture::class,
		        'dataFile' => 'tests/_fixtures/data/geo_region.php'
	        ],
	        [
		        'class' => GeoCountryFixture::class,
		        'dataFile' => 'tests/_fixtures/data/geo_country.php'
	        ],
        	[
                'class' => GeoCurrencyFixture::class,
                'dataFile' => 'tests/_fixtures/data/geo_currency.php'
            ],
        ]);
    }
    
	public function testAllWithRelations()
	{
		
		/** @var BaseEntity[] $collection */
		$query = Query::forge();
		$query->with('region.cities.country.currency');
		$query->with('region.cities.region');
		$query->with('region.country.currency');
		$query->with('country.currency');
		$query->where('id', 2000);
		$query->limit(1);
		$collection = \App::$domain->geo->city->all($query);
		
		$this->tester->assertCount(1, $collection);
		$this->tester->assertCollection([
			[
				'id' => 2000,
				'country_id' => 1894,
				'region_id' => 1994,
				'country' => [
					'id' => 1894,
					'currency' => [
						'id' => 1,
						'country_id' => 1894,
						'code' => 'KZT',
					],
				],
				'region' => [
					'id' => 1994,
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
							'id' => '1995',
							'country_id' => '1894',
							'region_id' => '1994',
							'country' => [
								'id' => 1894,
								'currency' => [
									'id' => 1,
									'country_id' => 1894,
									'code' => 'KZT',
								],
							],
							'region' => [
								'id' => 1994,
								'country_id' => 1894,
							],
						],
					],
				],
			]
		], $collection);
	}
	
	public function testOneWithRelations()
	{
		
		/** @var BaseEntity $entity */
		$query = Query::forge();
		$query->with('region.cities.country.currency');
		$query->with('region.cities.region');
		$query->with('region.country.currency');
		$query->with('country.currency');
		$query->where('id', 2000);
		$query->limit(1);
		$entity = \App::$domain->geo->city->one($query);
		
		$this->tester->assertEntity([
			'id' => 2000,
			'country_id' => 1894,
			'region_id' => 1994,
			'country' => [
				'id' => 1894,
				'currency' => [
					'id' => 1,
					'country_id' => 1894,
					'code' => 'KZT',
				],
			],
			'region' => [
				'id' => 1994,
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
						'id' => '1995',
						'country_id' => '1894',
						'region_id' => '1994',
						'country' => [
							'id' => 1894,
							'currency' => [
								'id' => 1,
								'country_id' => 1894,
								'code' => 'KZT',
							],
						],
						'region' => [
							'id' => 1994,
							'country_id' => 1894,
						],
					],
				],
			]
		
		], $entity);
	}
	
}
