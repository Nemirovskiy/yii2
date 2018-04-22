<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мои заметки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="note-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Новая', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'text:ntext',
            'created_at:datetime',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {share} {delete}',
                'buttons' => [
                    'share' => function($url,$model,$key){
                        return Html::a(\yii\bootstrap\Html::icon('share'),
                            ['/access/create/', 'noteId' => $model->id]);
                        }
                    ]
                ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
