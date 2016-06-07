<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->registerJs(' 
            $("#form-edit").on("submit", function(e) {
                var url = $(this).attr("action");
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#form-edit").serialize()
                  });
                $("#modal_edit").modal("hide");
                $.pjax.reload({container:"#patient", timeout: 0});
                return false;
            });
');
?>

<?php
$form = ActiveForm::begin([
            'options' => ['data-pjax' => 1],
            'action'  => yii\helpers\Url::to(['patient/update', 'id' => $model->id]),
            'id'      => 'form-edit',
        ]);
?>

 <?= $form->field($model, 'fio')->textInput(['maxlength' => 20]); ?>
 <?= $form->field($model, 'age')->textInput(['maxlength' => 2]); ?>
 <?= $form->field($model, 'basic_diagnosis')->textInput(['maxlength' => 20]); ?>
 <?= $form->field($model, 'comorbid_diagnoses')->textInput(['maxlength' => 20]); ?>
 <?= $form->field($model, 'benefits')->textInput(['maxlength' => 5]); ?>

<div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => 'btn btn-default']) ?>
</div>
<?php ActiveForm::end(); ?>