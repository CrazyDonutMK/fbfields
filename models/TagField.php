<?php

namespace app\models;

use Yii;

//Тег - идентификатор для категоризации записей.
//
//Атрибуты:
//
//Наименование - уникальное название сущности “Тег”. Например: Натуральный газон, Дешевый, Дорогой...


class TagField extends \yii\db\ActiveRecord
{


    public static function tableName()
    {
        return 'tag_field';
    }



    public function rules()
    {
        return [
            [['field_id', 'tag_id'], 'required'],
            [['field_id', 'tag_id'], 'integer'],
            [['field_id'], 'exist', 'skipOnError' => true, 'targetClass' => Field::className(), 'targetAttribute' => ['field_id' => 'id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::className(), 'targetAttribute' => ['tag_id' => 'id']],
        ];
    }



    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'field_id' => 'Field ID',
            'tag_id' => 'Tag ID',
        ];
    }



    public function getField()
    {
        return $this->hasOne(Field::className(), ['id' => 'field_id']);
    }



    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['id' => 'tag_id']);
    }
}
