<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property int $status_id
 * @property int $sort
 * @property string $date
 * @property string $image
 * @property string $url
 * @property int $author_id
 *
 * @property User $author
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'author_id'], 'required'],
            [['text'], 'string'],
            [['status_id', 'author_id'], 'integer'],
            [['date'], 'safe'],
            [['title', 'image', 'url'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'iд',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'status_id' => 'Статус',
            'date' => 'Дата',
            'image' => 'Рисунок',
            'url' => 'Посилання',
            'author_id' => 'Автор',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    
}
