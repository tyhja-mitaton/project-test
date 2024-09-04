<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $title
 * @property float $price
 * @property int $user_id
 * @property int|null $date_start
 * @property int|null $date_end
 *
 * @property User $user
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price', 'user_id'], 'required'],
            [['price'], 'number'],
            [['user_id', 'date_start', 'date_end'], 'integer'],
            [['title', 'dateBegin', 'dateFinish'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'price' => Yii::t('app', 'Price'),
            'user_id' => Yii::t('app', 'User'),
            'date_start' => Yii::t('app', 'Date Start'),
            'date_end' => Yii::t('app', 'Date End'),
            'dateBegin' => Yii::t('app', 'Date Start'),
            'dateFinish' => Yii::t('app', 'Date End'),
        ];
    }

    public function getDateBegin()
    {
        return isset($this->date_start) ? date('d-m-Y', $this->date_start) : null;
    }

    public function setDateBegin($date)
    {
        $this->date_start = strtotime($date);
    }

    public function getDateFinish()
    {
        return isset($this->date_end) ? date('d-m-Y', $this->date_end) : null;
    }

    public function setDateFinish($date)
    {
        $this->date_end = isset($date) ? strtotime($date) : null;
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
