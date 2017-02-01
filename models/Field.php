<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Field".
 *
 * @property integer $id
 * @property string $adress
 * @property string $cost_type
 * @property string $field_type
 * @property string $time
 * @property string $phone
 * @property integer $district_id
 *
 * @property District $district
 * @property TagField[] $tagFields
 */
class Field extends \yii\db\ActiveRecord
{

    private $tags = [];
    public $tagids = [];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Field';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['adress', 'cost_type', 'field_type', 'time', 'phone', 'district_id'], 'required'],
            [['district_id'], 'integer'],
            [['adress', 'cost_type', 'field_type'], 'string', 'max' => 50],
            [['time'], 'string', 'max' => 75],
            [['phone'], 'string', 'max' => 15],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['district_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'adress' => 'Adress',
            'cost_type' => 'Cost Type',
            'field_type' => 'Field Type',
            'time' => 'Time',
            'phone' => 'Phone',
            'district_id' => 'District ID',
        ];
    }

    public function fields()
    {
        return [
            'id',
            'adress',
            'cost_type',
            'field_type',
            'time',
            'phone',
            'district' => function ($model) {
                return $model->district['name'];
            },

        ];
    }

    public function extraFields(){
        return [
            'tags' => function ($model) {
                return $model->getTags();
            },
        ];
    }

    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable(TagField::tableName(), ['field_id' => 'id'])->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 'district_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagFields()
    {
        return $this->hasMany(TagField::className(), ['field_id' => 'id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        $data = yii::$app->request->post();
        $this->tagids = $data['tagids'];
        $this->updateTags();
        parent::afterSave($insert, $changedAttributes);
    }

    public function updateTags()
    {
        $is = $this->id;
        foreach ($this->tagids as $id) {
            $tagField = new TagField();
            $tagField->field_id = $is;
            $tagField->tag_id = $id;
            $tagField->save();
        }
    }

    public function beforeDelete(){
       TagField::deleteAll(['field_id' => $this->id]);
       return parent::beforeDelete();
    }

}
