<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Project $model */
/** @var array $userList */

$this->title = Yii::t('app', 'Update Project: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="project-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'userList' => $userList,
    ]) ?>

</div>
