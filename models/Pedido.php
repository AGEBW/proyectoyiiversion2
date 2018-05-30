<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property int $idpedido
 * @property string $fecha
 * @property int $idcliente
 *
 * @property Detallepedido[] $detallepedidos
 * @property Cliente $cliente
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['idcliente'], 'required'],
            [['idcliente'], 'integer'],
            [['idcliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['idcliente' => 'idcliente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpedido' => 'Idpedido',
            'fecha' => 'Fecha',
            'idcliente' => 'Idcliente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallepedidos()
    {
        return $this->hasMany(Detallepedido::className(), ['idpedido' => 'idpedido']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['idcliente' => 'idcliente']);
    }
}
