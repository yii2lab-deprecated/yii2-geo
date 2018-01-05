<?php

namespace yii2lab\geo\widgets;

use Yii;
use yii\base\Widget;
use yii2lab\domain\data\Query;
use yii\helpers\ArrayHelper;

class GeoSelector extends Widget
{
	
	public $form;
	public $formId;
	public $model;
	public $default = [];
	
	/**
	 * Runs the widget
	 */
	public function run()
	{
		$country = $this->getCountryCollection();
		$region = $this->getRegionCollection(1894);
		$city = $this->getCityCollection($this->model->region_id);
		return $this->render('fields', [
			'form' => $this->form,
			'formId' => $this->formId,
			'model' => $this->model,
			'country' => $country,
			'region' => $region,
			'city' => $city,
		]);
	}
	
	private function getCountryCollection() {
		$query = Query::forge();
		$query->orderBy('name');
		$collection = Yii::$app->geo->country->all($query);
		$collection = ArrayHelper::map($collection, 'id', 'name');
		return $collection;
	}
	
	private function getRegionCollection($countryId) {
		$query = Query::forge();
		$query->where('country_id', $countryId);
		//$query->perPage(9999999);
		$query->orderBy('name');
		$collection = Yii::$app->geo->region->all($query);
		$collection = ArrayHelper::map($collection, 'id', 'name');
		return $collection;
	}
	
	private function getCityCollection($regionId) {
		$query = Query::forge();
		$query->where('region_id', $regionId);
		//$query->perPage(9999999);
		$query->orderBy('name');
		$collection = Yii::$app->geo->city->all($query);
		$collection = ArrayHelper::map($collection, 'id', 'name');
		return $collection;
	}
}
