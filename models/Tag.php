<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Tag".
 *
 * @property integer $id
 * @property string $name
 *
 * @property TagField[] $tagFields
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getFields()
    {
        return $this->hasMany(Field::className(), ['id' => 'field_id'])->viaTable(TagField::tableName(), ['tag_id' => 'id']);
    }

    public function getTagFields()
    {
        return $this->hasMany(TagField::className(), ['tag_id' => 'id']);
    }
}
