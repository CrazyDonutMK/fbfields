<?php

namespace app\models;

use Yii;



class Tag extends \yii\db\ActiveRecord
{


    public static function tableName()
    {
        return 'Tag';
    }



    public function rules()
    {
        return [
//            [['name'], 'required'],
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
        return $this->hasMany(Field::className(), ['id' => 'field_id'])->viaTable(TagField::tableName(), ['tag_id' => 'id']);
    }

    public function getTagFields()
    {
        return $this->hasMany(TagField::className(), ['tag_id' => 'id']);
    }
}
