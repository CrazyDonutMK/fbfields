<?php

namespace app\models;

use Yii;

/* Район - это территориальная единица города Томска.
 * Наименование - уникальное наименование района.
 * Пример: Кировский, Ленинский..
*/

class District extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'District';
    }


    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['name'], 'unique'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }


    public function getFields()
    {
        return $this->hasMany(Field::className(), ['district_id' => 'id']);
    }
}
