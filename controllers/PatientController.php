<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Patient;
use yii\data\ActiveDataProvider;

class PatientController extends Controller {

    // действие по умолчанию
    public function actionIndex($id = null) {
        $patient = new Patient();

        // если была отправлена форма на добавление, то сохраняем объект в БД
        if ($patient->load(Yii::$app->request->post()) && $patient->save()) {
            $patient = new Patient(); // сбрасываем данные после сохранения
        }
        
        // получаем данные из базы данных
        $dataProvider = new ActiveDataProvider([
            'query' => Patient::find(),
        ]);

        // загружаем представление для вывода
        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'model'        => $patient,
        ]);
    }

    // удаление
    public function actionDelete($id) {
        // ищем запись в БД по ID. если находим, то удаляем
        $patient = Patient::findOne($id);
        if ($patient !== null) {
            $patient->delete();
        }
        
        // обновляем данные, вывзвав действие по умолчанию
        $this->actionIndex();
    }

    // получение данныз по ID
    public function actionGet($id) {
        $model = Patient::findOne($id);
        // загружаем форму для модального окна с данными
        return $this->renderAjax('_get', [
                    'model' => $model
        ]);
    }

    // изменение данных
    public function actionUpdate($id) {
        // ищем запись для изменения
        $patient = Patient::findOne($id);

        // если форма была отправлена и найдена запись для изменения
        if (Yii::$app->request->post('Patient')) {
            $patient->setAttributes(Yii::$app->request->post('Patient'));
            $patient->update();
        }
        
        // загружаем все данные из БД
        $dataProvider = new ActiveDataProvider([
            'query' => Patient::find(),
        ]);

        // загружаем представление для обновления данных
        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'model'        => $patient,
        ]);
    }

}
