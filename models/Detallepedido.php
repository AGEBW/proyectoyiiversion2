<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detallepedido".
 *
 * @property int $iddetallepedido
 * @property int $cantidad
 * @property string $precio
 * @property int $idpedido
 * @property int $idproducto
 *
 * @property Pedido $pedido
 * @property Producto $producto
 */
class Detallepedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detallepedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cantidad', 'precio', 'idpedido', 'idproducto'], 'required'],
            [['cantidad', 'idpedido', 'idproducto'], 'integer'],
            [['precio'], 'number'],
            [['idpedido'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => ['idpedido' => 'idpedido']],
            [['idproducto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['idproducto' => 'idproducto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddetallepedido' => 'Iddetallepedido',
            'cantidad' => 'Cantidad',
            'precio' => 'Precio',
            'idpedido' => 'Idpedido',
            'idproducto' => 'Idproducto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedido::className(), ['idpedido' => 'idpedido']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['idproducto' => 'idproducto']);
    }
}
