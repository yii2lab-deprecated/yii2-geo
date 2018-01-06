<?php

use yii\helpers\Html;
use yii2lab\misc\enums\HtmlEnum;
use yii\web\View;

/**
 * @var $collection array
 */

?>

<?php if($model->hasProperty('country_id')) { ?>
	<?= $form->field($model, 'country_id')->dropDownList($country, ['prompt' => Yii::t('geo/main', 'select_country')]) ?>
<?php } ?>

<?php if($model->hasProperty('region_id')) { ?>
	<?= $form->field($model, 'region_id')->dropDownList($region, ['prompt' => Yii::t('geo/main', 'select_region')]) ?>
<?php } ?>

<?php if($model->hasProperty('city_id')) { ?>
	<?= $form->field($model, 'city_id')->dropDownList($city, ['prompt' => Yii::t('geo/main', 'select_city')]) ?>
<?php } ?>

<?php

$script = "

var lang = {
	select_region: '".Yii::t('geo/main', 'select_region')."',
	select_city: '".Yii::t('geo/main', 'select_city')."'
};

function setOptions(name, data) {
	var selector = $('#".$formId."-'+name+'_id');
	var selector_options = $('#".$formId."-'+name+'_id option');
	selector_options.remove();
	selector.append( $('<option value=\"0\">'+lang['select_'+name]+'</option>'));
	for(var index in data) {
	    var item = data[index];
	    selector.append( $('<option value=\"'+item.id+'\">'+item.name+'</option>'));
	    selector.change();
	}
}

function runRequest(name, data) {
	$.ajax({
        method: 'get',
        url: '". env('url.api') . "v4/'+name,
        data: data,
        dataType: 'json',
        success: function (data) {
        	setOptions(name, data);
        },
    });
}

function attach(name, nameChildren) {
	$('#".$formId."-'+name+'_id').change(function(){
    var id = $('#".$formId."-'+name+'_id').val();
    var data = {};
    data[name+'_id'] = id;
    data['per-page'] = 9999999;
    data['sort'] = 'name';
    runRequest(nameChildren, data);
});
}

attach('country', 'region');
attach('region', 'city');

";

$this->registerJs($script, View::POS_READY);

?>
