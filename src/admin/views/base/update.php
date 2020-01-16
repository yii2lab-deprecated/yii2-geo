<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = Yii::t('geo/phone', 'update title');
/* @var array $countryList */
 ?>

<div class="active-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'countryList' => $countryList
    ]) ?>

</div>

