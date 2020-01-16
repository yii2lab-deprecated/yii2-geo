<?php

namespace yii2lab\geo\admin\actions;


use App;
use Yii;
use yii2lab\domain\base\Action;
use yii2lab\domain\exceptions\UnprocessableEntityHttpException;
use yii2lab\navigation\domain\widgets\Alert;


class CreateAction extends Action
{

	public $serviceMethod = 'create';

	public function run()
	{
		$this->view->title = Yii::t('geo/phone', 'create title');
		$model = $this->createForm();
		if (Yii::$app->request->isPost && !$model->hasErrors()) {
			try {
				$this->runServiceMethod($model->toArray());
				\App::$domain->navigation->alert->create(['main', 'create_success'], Alert::TYPE_SUCCESS);
				return $this->redirect('/geo');
			} catch (UnprocessableEntityHttpException $e) {
				$model->addErrorsFromException($e);
			}
		}
		$countryList = [];
		foreach (App::$domain->geo->country->all() as $countryItem) {
			$countryList[$countryItem->id] = $countryItem->name;
		}
		return $this->render('create', compact('model', 'countryList'));
	}



}
