<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "Cubans".
 */
class Cubans extends \yii\db\ActiveRecord
{
    /**
     * Return table name
     */
    public static function tableName()
    {
        return '{{Cubans}}';
    }
    /**
     * Add rules of validation
     */
    public function rules()
    {
        return [
            [['FirstName', 'LastName', 'Gender', 'YearOfBirth', 'IdGenre', 'IsInGroup'], 'required'],
            [['YearOfBirth'], 'number', 'max' => 2020, 'min' => 1901],
            [['IdGenre'], 'integer'],
            [['FirstName', 'LastName'], 'string', 'max' => 20],
            [['Gender'], 'string', 'max' => 10],
            [['IsInGroup'], 'string', 'max' => 40],
            [['IdGenre'], 'exist', 'skipOnError' => true, 'targetClass' => Genre::className(), 'targetAttribute' => ['IdGenre' => 'id']],
        ];
    }
    /**
     * Aliases for table values
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'FirstName' => 'First Name',
            'LastName' => 'Last Name',
            'Gender' => 'Gender',
            'YearOfBirth' => 'Year Of Birth',
            'IdGenre' => 'Genre Name',
            'IsInGroup' => 'Is In Group',
        ];
    }
    /**
     * Link to one-to-many table Genre
     */
    public function getGenre()
    {
        return $this->hasOne(Genre::className(), ['id' => 'IdGenre']);
    }
}
