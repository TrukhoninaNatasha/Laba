<?php

/* @var $this yii\web\View */

$this->title = 'Склад ООО "Трухонина"';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Добро пожаловать в аптеку</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Пациент</h2>

                <p>Список пациентов с фамилиями, возрастом и диагнозами.</p>

                <p><a class="btn btn-default" href="<?= yii\helpers\Url::to(['patient/index']) ?>">Подробнее &raquo;</a></p>
            </div>
           
        </div>

    </div>
</div>
