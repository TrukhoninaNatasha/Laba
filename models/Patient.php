<?php

namespace app\models;

use yii\db\ActiveRecord;

class Patient extends ActiveRecord {

    // правила для проверки формы перед отправкой
    public function rules() {
        return [
            [['fio', 'age', 'basic_diagnosis', 'comorbid_diagnoses', 'benefits'], 'required',
                'message' => 'Заполните это поле'],
            [['age'], 'integer',
                'message' => 'Допустыме символы: 0-9'],
            [['age'], 'integer', 'max' => 99,
                'message' => 'Длина не должна превышать 2 символов'],
            [['fio', 'basic_diagnosis', 'comorbid_diagnoses', 'benefits'], 'string', 'length' => [2, 20],
                'message'  => 'Длина должна быть от 2 до 20 символов',
                'tooShort' => 'Длина должна быть минимум 2 символа',
                'tooLong'  => 'Длина не должна превышать 20 символов.'],
        ];
    }

    // имена полей
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'fio' => 'Фамилия',
            'age' => 'Возраст',
            'basic_diagnosis' => 'Основной диагноз',
            'comorbid_diagnoses' => 'Дополнительный диагноз',
            'benefits' => 'Да/Нет',
        ];
    }

}
