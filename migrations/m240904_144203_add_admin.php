<?php

use yii\db\Migration;

/**
 * Class m240904_144203_add_admin
 */
class m240904_144203_add_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->db->createCommand()->insert('user', [
            'full_name' => 'admin',
            'logs' => 'admin',
            'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'access_token' => Yii::$app->security->generateRandomString(),
        ])->execute();

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->db->createCommand()->delete('user', 'full_name = :name', [':name' => 'admin'])->execute();
    }
}
