<?php

namespace yii2lab\geo\domain\interfaces\services;

use yii2lab\domain\interfaces\services\CrudInterface;
use yii2lab\geo\domain\entities\PhoneEntity;

/**
 * Interface PhoneInterface
 * 
 * @package yii2lab\geo\domain\interfaces\services
 * 
 * @property-read \yii2lab\geo\domain\Domain $domain
 * @property-read \yii2lab\geo\domain\interfaces\repositories\PhoneInterface $repository
 */
interface PhoneInterface extends CrudInterface {
	
	public function oneByPhone(string $phone) : PhoneEntity;
	public function parse(string $phone);
	public function format(string $phone);
}
