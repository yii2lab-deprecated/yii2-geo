<?php

/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\helpers\Html;
use yii2lab\extension\web\grid\ActionColumn;

$this->title = Yii::t('geo/phone', 'title');


$baseUrl = $this->context->getBaseUrl();

$columns = [
	[
		'attribute' => 'id',
		'label' => Yii::t('geo/phone', 'id'),
	],
	[
		'attribute' => 'country_id',
		'label' => Yii::t('geo/phone', 'country_id'),
	],
	[
		'attribute' => 'mask',
		'label' => Yii::t('geo/phone', 'mask'),
	],
	[
		'attribute' => 'rule',
		'label' => Yii::t('geo/phone', 'rule'),
	],
	[
		'class' => ActionColumn::class,
		'template' => '{update} {delete}'
	],
];

?>

<?= GridView::widget([
	'dataProvider' => $dataProvider,
	'layout' => '{geo}{items}',
	'columns' => $columns,
]); ?>

<?= Html::a(Yii::t('action', 'create'), $baseUrl . 'create', ['class' => 'btn btn-success']) ?>