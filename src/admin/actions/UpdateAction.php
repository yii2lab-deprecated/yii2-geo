<?php

namespace yii2lab\geo\admin\actions;


use App;
use Yii;
use yii2lab\domain\base\Action;
use yii2lab\domain\exceptions\UnprocessableEntityHttpException;
use yii2lab\navigation\domain\widgets\Alert;

class UpdateAction extends Action
{

	public $serviceMethod = 'updateById';
	public $serviceMethodOne = 'oneById';

	public function run($id)
	{

		$this->view->title = Yii::t('geo/phone', 'update_title');
		$methodOne = $this->serviceMethodOne;
		$entity = $this->service->$methodOne($id);
		$model = $this->createForm($entity->toArray());

		if (Yii::$app->request->isPost && !$model->hasErrors()) {
			try {
				$method = $this->serviceMethod;
				$this->service->$method($id, $model->toArray());
				\App::$domain->navigation->alert->create(['main', 'update_success'], Alert::TYPE_SUCCESS);
				return $this->redirect('/geo');
			} catch (UnprocessableEntityHttpException $e) {
				$model->addErrorsFromException($e);
			}
		}
		$countryList = [];
		foreach (App::$domain->geo->country->all() as $countryItem) {
			$countryList[$countryItem->id] = $countryItem->name;
		}

		return $this->render('update', compact('model', 'countryList'));
	}
}
