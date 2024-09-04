<?php

use app\models\Project;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\Project $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var array $userList */

$this->title = Yii::t('app', 'Projects');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Project'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'title',
            'price',
            [
                'attribute' => 'userId',
                'label' => 'User',
                'value' => function ($model) {
                    return $model->user->full_name;
                },
                'filter' => $userList,
            ],
            [
                'attribute' => 'dateBegin',
                'filter' => \kartik\date\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'dateBegin',
                    'type' => \kartik\date\DatePicker::TYPE_COMPONENT_APPEND,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy',
                        'firstDay' => 1,
                    ]
                ])
            ],
            [
                'attribute' => 'dateFinish',
                'filter' => \kartik\date\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'dateFinish',
                    'type' => \kartik\date\DatePicker::TYPE_COMPONENT_APPEND,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy',
                        'firstDay' => 1,
                    ]
                ])
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Project $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
