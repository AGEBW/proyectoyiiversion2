<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Detallepedido */

$this->title = $model->iddetallepedido;
$this->params['breadcrumbs'][] = ['label' => 'Detallepedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallepedido-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'iddetallepedido' => $model->iddetallepedido, 'idpedido' => $model->idpedido, 'idproducto' => $model->idproducto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'iddetallepedido' => $model->iddetallepedido, 'idpedido' => $model->idpedido, 'idproducto' => $model->idproducto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'iddetallepedido',
            'cantidad',
            'precio',
            'idpedido',
            'idproducto',
        ],
    ]) ?>

</div>
