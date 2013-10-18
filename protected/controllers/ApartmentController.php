<?php
/**
 * @author Denis A Boldinov
 *
 * @copyright
 * Copyright (c) 2012 Denis A Boldinov
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software
 * and associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all copies or substantial
 * portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT
 * LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN
 * NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE
 * OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 */
class ApartmentController extends Controller
{
    public $layout = '//layouts/index';

    public $linkToContainer = true;

    public function actionIndex()
    {
//        unset(Yii::app()->session['searchState']);
        $model = new Apartment('search');
        $model->unsetAttributes();

        $this->loadSearchState($model);

        // Force NOT container published objects
        $model->container = 0;
        $model->is_published = 1;
        $apartmentDataProvider = $model->search();

        $this->render('index', array(
            'model' => $model,
            'apartmentDataProvider' => $apartmentDataProvider,
        ));
    }

    public function actionRent()
    {
        $model = new Apartment('search');
        $model->unsetAttributes();

        $this->loadSearchState($model);

        // Force NOT container published objects
        $model->container = 0;
        $model->is_published = 1;
        $model->is_rent = 1;
        $apartmentDataProvider = $model->search();

        $this->render('index', array(
            'model' => $model,
            'apartmentDataProvider' => $apartmentDataProvider,
        ));
    }

    public function actionSale()
    {
        $model = new Apartment('search');
        $model->unsetAttributes();

        if (isset($_GET['Apartment'])) {
            $model->attributes = $_GET['Apartment'];
        }

        // Force NOT container published objects
        $model->container = 0;
        $model->is_published = 1;
        $model->is_rent = 0;
        $apartmentDataProvider = $model->search();

        $this->render('index', array(
            'model' => $model,
            'apartmentDataProvider' => $apartmentDataProvider,
        ));
    }

    public function actionView($id = null)
    {

        $this->linkToContainer = false;

        // Register yandex maps JS api
        Yii::app()->clientScript->registerScriptFile('http://api-maps.yandex.ru/2.0/?load=package.full&mode=release&lang=ru-RU');

        $model = $this->loadModel($id, true);

        $apartmentDataProvider = null;
        if ($model->container == 1) {
            // Load all objects in container
            $criteria = new CDbCriteria();
            $criteria->addColumnCondition(array(
                'parent_id' => $id,
                'is_published' => Apartment::PUBLISHED,
                'container' => 0,
            ));

            $dependency = new CDbCacheDependency('SELECT MAX(updated_at) FROM apartment');
            $apartmentDataProvider = new CActiveDataProvider(Apartment::model()->standalone()->cache(Yii::app()->params['cache_expire_time'], $dependency), array(
                'criteria' => $criteria,
            ));
        }

        $dependency = new CDbCacheDependency('SELECT MAX(updated_at) FROM apartment_attribute WHERE apartment_id = ' . intval($model->id));
        $apartmentAttributes = ApartmentAttribute::model()->with('attribute')->cache(Yii::app()->params['cache_expire_time'], $dependency)->findAllByAttributes(array(
            'apartment_id' => $model->id
        ));

        $dependency = new CDbCacheDependency('SELECT MAX(updated_at) FROM apartment_file WHERE apartment_id = ' . intval($model->id));
        $apartmentFiles = ApartmentFile::model()->cache(Yii::app()->params['cache_expire_time'], $dependency)->findAllByAttributes(array(
            'apartment_id' => $model->id
        ));

        $contactForm = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $contactForm->attributes = $_POST['ContactForm'];
            if ($contactForm->validate()) {
                $headers = "From: {$contactForm->email}\r\nReply-To: {$contactForm->email}";
                mail(Yii::app()->params['adminEmail'], $contactForm->subject, $contactForm->body, $headers);
                Yii::app()->user->setFlash('contact', 'Спасибо за запрос. Мы обязательно свяжемся с Вами в ближайшее время');
                $this->refresh();
            }
        }

        $this->render('view', array(
            'model' => $model,
            'apartmentDataProvider' => $apartmentDataProvider,
            'apartmentAttributes' => $apartmentAttributes,
            'apartmentFiles' => $apartmentFiles,
            'contactForm' => $contactForm,
        ));
    }

    protected function loadModel($id)
    {
        $model = Apartment::model()->cache(Yii::app()->params['cache_apartment_time']);

        $apartment = $model->findByPk($id);

        if (!$apartment) {
            throw new CHttpException(404, 'Страница не найдена');
        }
        return $apartment;
    }

    protected function loadSearchState($model)
    {
        if (isset($_GET['Apartment'])) {
            if ($searchState = Yii::app()->session['searchState']) {
                foreach ($searchState as $index => $value) {
                    if (isset($_GET['Apartment'][$index])) {
                        $model->setAttribute($index, $value);
//                        $model->$index = $value;
                    }
                }
            }

            $model->attributes = $_GET['Apartment'];
            Yii::app()->session['searchState'] = $_GET['Apartment'];
        } else {
            if ($searchState = Yii::app()->session['searchState']) {
                $model->attributes = $searchState;
            }
        }
    }
}
