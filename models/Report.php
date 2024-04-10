<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report".
 *
 * @property int $id
 * @property int $time_calc
 * @property int $user_id
 * @property int $rate
 * @property int $order_id
 *
 * @property Order $order
 * @property User $user
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['time', 'user_id', 'order_id'], 'required'],
            [['time', 'user_id', 'rate', 'order_id'], 'integer'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Время потраченное',
            'user_id' => 'Номер пользователя',
            'rate' => 'Оценка',
            'order_id' => 'Номер заявки',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
