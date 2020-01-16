<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */


/* @var $model yii2lab\geo\admin\forms\PhoneForm */
/* @var array $countryList */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

\App::$domain->navigation->breadcrumbs->create($this->title);

?>
<div class="send-email">

    <div class="row">
        <div class="col-lg-5">
			<?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'country_id')->dropDownList($countryList) ?>
			<?= $form->field($model, 'mask')->textInput() ?>
			<?= $form->field($model, 'rule')->textInput() ?>

            <div class="form-group">
				<?= Html::submitButton(Yii::t('action', 'send'), ['class' => 'btn btn-primary']) ?>
            </div>

			<?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
