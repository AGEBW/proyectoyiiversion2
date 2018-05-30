<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $idproducto
 * @property string $nombrep
 * @property string $preciosugerido
 *
 * @property Detallepedido[] $detallepedidos
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombrep', 'preciosugerido'], 'required'],
            [['preciosugerido'], 'number'],
            [['nombrep'], 'string', 'max' => 13],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idproducto' => 'Idproducto',
            'nombrep' => 'Nombrep',
            'preciosugerido' => 'Preciosugerido',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallepedidos()
    {
        return $this->hasMany(Detallepedido::className(), ['idproducto' => 'idproducto']);
    }
}
