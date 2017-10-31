<?php

namespace yii2lab\geo\api\helpers;

use Yii;

/* todo: перенести в модуль транзакций на фронтэнд */

class GeoHelper {
	public static function getCites() {
		$cites = Yii::$app->geo->city->all();
		$arrayCites = [null => 'все города'];
		foreach($cites as $city) {
			$arrayCites[ $city->id ] = $city->city_name;
		}
		return $arrayCites;
	}
	
}