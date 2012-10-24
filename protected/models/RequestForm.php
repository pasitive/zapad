<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class RequestForm extends CFormModel
{
	public $name;
	public $email;
    public $phone;
    public $time;

    public $square;
    public $room_number;
    public $is_rent;
    public $address;
    public $price_from;
    public $price_to;
    public $apartment_id;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, email', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
            array('phone, time, date', 'safe'),
			// verifyCode needs to be entered correctly
//			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'name'=>'Имя',
			'email'=>'Email',
			'phone'=>'Телефон для связи',
			'body'=>'Ваш комментарий/вопрос',
            'time' => 'Удобное время звонка',
            'date' => 'Дата звонка',
            
            'square' => 'Площадь',
            'room_number' => 'Кол-во комнат',
            'is_rent' => 'Действие',
            'address' => 'Адрес',
            'price_from' => 'Желаемая сумма от',
            'price_to' => 'до',
            'apartment_id' => 'Жилой комплекс',
		);
	}
}