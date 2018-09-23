<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model {

	public $image;

	public function rules()
	{
		return [
			[['image'],'required'],
			[['image'],'file', 'extensions' => 'jpg, png'],
		];
	}

	public function uploadFile(UploadedFile $file, $currentImage) 
	{

		$this->image = $file;

		if ($this->validate()) {
			//if(file_exists(Yii::getAlias('@web') . 'teachers/' . $currentImage)) // если фото существует в папке
			
				//unlink(Yii::getAlias('@web') . 'teachers/' . $currentImage);
			

			$filename = strtolower(md5(uniqid($file->baseName)) . '.' . $file->extension);
			$file->saveAs(Yii::getAlias('@web') . 'teachers/' . $filename);

			return $filename;
		}
	}
}