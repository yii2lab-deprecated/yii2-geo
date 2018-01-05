<?php

namespace yii2lab\geo\api\helpers;

use Yii;
use yii2lab\domain\data\Query;

/* todo: перенести в модуль транзакций на фронтэнд */

class GeoHelper {
	public static function getCites($countryId = null) {
		$query = Query::forge();
		if($countryId) {
			$query->where('country_id', $countryId);
		}
		$cites = Yii::$app->geo->city->all($query);
		$arrayCites = [null => 'все города'];
		foreach($cites as $city) {
			$arrayCites[ $city->id ] = $city->name;
		}
		return $arrayCites;
	}
	
}