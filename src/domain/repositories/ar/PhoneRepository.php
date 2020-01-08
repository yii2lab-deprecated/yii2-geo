<?php

namespace yii2lab\geo\domain\repositories\ar;

use yii2lab\domain\repositories\ActiveArRepository;
use yii2lab\geo\domain\interfaces\repositories\PhoneInterface;

/**
 * Class PhoneRepository
 *
 * @package yii2lab\geo\domain\repositories\filedb
 *
 * @property-read \yii2lab\geo\domain\Domain $domain
 */
class PhoneRepository extends ActiveArRepository implements PhoneInterface
{

	protected $schemaClass = true;

}
