<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Group".
 */
class Group extends ActiveRecord
{
    /**
     * Return table name
     */
    public static function tableName()
    {
        return '{{Group}}';
    }
    /**
     * Add rules of validation
     */
    public function rules()
    {
        return [
            [['NameGroup'], 'required'],
            [['NameGroup'], 'string', 'max' => 45],
            [['NameGroup'], 'unique'],
        ];
    }
    /**
     * Aliases for table values
     */
    public function attributeLabels()
    {
        return [
            'idGroup' => 'Id',
            'NameGroup' => 'Group Name',
        ];
    }
    /**
     * Link to one-to-many table Cubans
     */
    public function getCubans()
    {
        return $this->hasMany(Cubans::className(), ['IsInGroup' => 'idGroup']);
    }

    public static function getAllGroups() {
        return ArrayHelper::map(self::find()->all(), 'idGroup', 'NameGroup');
    }
}
