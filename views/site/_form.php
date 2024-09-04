<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Project $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $userList */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'user_id')->dropDownList($userList, ['prompt' => '']) ?>

    <?= $form->field($model, 'dateBegin')->widget(DatePicker::class, [
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'value' => $model->dateBegin,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy',
            'firstDay' => 1,
        ]
    ]) ?>

    <?= $form->field($model, 'dateFinish')->widget(DatePicker::class, [
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'value' => $model->dateBegin,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy',
            'firstDay' => 1,
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
