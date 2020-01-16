<?php

use yii\helpers\Html;

/* @var array $countryList */

$this->title = Yii::t('geo/phone', 'create title');
?>
<div class="active-type-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
        'countryList' => $countryList
	]) ?>

</div>