<?php

namespace tests\functional\services;

use yii2lab\test\helpers\DataHelper;
use yii2lab\test\Test\Unit;
use yii2lab\domain\BaseEntity;
use yii2lab\domain\data\Query;
use yii2lab\geo\domain\fixtures\GeoCityFixture;
use yii2lab\geo\domain\fixtures\GeoCountryFixture;
use yii2lab\geo\domain\fixtures\GeoCurrencyFixture;
use yii2lab\geo\domain\fixtures\GeoRegionFixture;

class CityTest extends Unit
{
	
	const PACKAGE = 'yii2lab/yii2-geo';
	
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
		
		$expect = DataHelper::loadForTest(self::PACKAGE, __METHOD__, $collection);
		$this->tester->assertCollection($expect, $collection, true);
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
		
		$expect = DataHelper::loadForTest(self::PACKAGE, __METHOD__, $entity);
		$this->tester->assertEntity($expect, $entity, true);
	}
	
}
