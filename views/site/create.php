<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Project $model */
/** @var array $userList */

$this->title = Yii::t('app', 'Create Project');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'userList' => $userList,
    ]) ?>

</div>
