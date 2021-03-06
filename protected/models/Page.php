<?php

/**
 * This is the model class for table "page".
 *
 * The followings are the available columns in table 'page':
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 * @property string $body
 * @property string $title
 */
class Page extends CActiveRecord
{
    public $routeable_pattern;
    public $routeable_keywords;
    public $routeable_description;
    public $routeable_title;

    /**
     * Returns the static model of the specified AR class.
     * @return Page the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'page';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, body', 'required'),
            array('name, title', 'length', 'max' => 255),
            array('name', 'unique'),
            array('routeable_keywords, routeable_description, routeable_title, body', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, created_at, updated_at, name, body', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('common', 'id'),
            'title' => 'Название страницы',
            'name' => 'Идентификатор',
            'body' => Yii::t('page', 'body'),
            'routeable_title' => 'SEO Заголовок',
            'routeable_keywords' => 'SEO Ключевые слова',
            'routeable_description' => 'SEO Описание',
            'created_at' => Yii::t('common', 'created_at'),
            'updated_at' => Yii::t('common', 'updated_at'),
        );
    }

    /**
     * @return array behaviors.
     */
    public function behaviors()
    {
        return array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'created_at',
                'updateAttribute' => 'updated_at',
                'setUpdateOnCreate' => true
            ),
            /*'RouteableBehavior' => array(
                'class' => 'application.components.RouteableBehavior',
                'controller' => 'page'
            )*/
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('updated_at', $this->updated_at, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('body', $this->body, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}