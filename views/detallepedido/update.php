<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Detallepedido */

$this->title = 'Update Detallepedido: ' . $model->iddetallepedido;
$this->params['breadcrumbs'][] = ['label' => 'Detallepedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddetallepedido, 'url' => ['view', 'iddetallepedido' => $model->iddetallepedido, 'idpedido' => $model->idpedido, 'idproducto' => $model->idproducto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detallepedido-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
