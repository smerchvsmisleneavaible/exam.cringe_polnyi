<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $date_add
 * @property string $equip
 * @property string $type_break
 * @property string $client_phone
 * @property string $state
 * @property int $user_id
 *
 * @property OrderDetail[] $orderDetails
 * @property User $user
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_add', 'equip', 'type_break', 'client_phone', 'user_id', 'state_id'], 'required'],
            [['date_end'], 'date', 'format' => 'yyyy-MM-dd'],
            [['user_id', 'state_id'], 'integer'],
            [['equip', 'type_break', 'client_phone'], 'string', 'max' => 32],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['state_id'], 'exist', 'skipOnError' => true, 'targetClass' => State::class, 'targetAttribute' => ['state_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер заказа',
            'date_add' => 'Дата начала исполнения',
            'date_end' => 'Дата окончания исполнения',
            'equip' => 'Оборудование',
            'type_break' => 'Тип поломки',
            'client_phone' => 'Номер телефона клиента',
            'state_id' => 'Статус',
            'user_id' => 'Мастер, закрепленный за ремонтом',
        ];
    }

    /**
     * Gets query for [[OrderDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::class, ['order_id' => 'id']);
    }
    public function getReports()
    {
        return $this->hasMany(Report::class, ['order_id' => 'id']);
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
    public function getState()
    {
        return $this->hasOne(State::class, ['id' => 'state_id']);
    }
}
