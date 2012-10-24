<?php

class PageController extends Controller
{

    public $layout = '//layouts/static';

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($name)
    {
        $requestForm = new RequestForm();
        $model = Page::model()->findByAttributes(array(
            'name' => $name,
        ));

        if(isset($_POST['RequestForm'])) {
            $requestForm->attributes = $_POST['RequestForm'];

            $ids = array();
            $raw = $_POST['Apartment']['parent_id'];
            foreach($raw as $id) {
                $ids[] = intval($id);
            }

            if($requestForm->validate())
            {

                $criteria = new CDbCriteria();
                $criteria->addInCondition('id', $ids);
                $criteria->index = 'id';
                $apartments = Apartment::model()->findAll($criteria);

                $apartmentNames = array();
                foreach($apartments as $apartment) {
                    $apartmentNames[] = $apartment->name;
                }

                $message = new YiiMailMessage;
                $message->view = 'requestForm';
                $message->setBody(array(
                    'model' => $requestForm,
                    'apartmentNames' => $apartmentNames,
                ), 'text/html');
                $message->subject = 'Новое сообщение с сайта';
                $message->addTo(Yii::app()->params['adminEmail']);
                $message->from = 'noreply@zapadrealty.ru';
                Yii::app()->mail->send($message);

                Yii::app()->user->setFlash('success', 'Спасибо');
            }
        }

        if (!$model) {
            throw new CHttpException(404, 'Страница не найдена');
        }

        $this->render('view', array('model' => $model, 'requestForm' => $requestForm));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $this->actionView(1);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = Page::model()->cache(Yii::app()->params['cache_expire_time'])->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'Страница не найдена');
        return $model;
    }
}
