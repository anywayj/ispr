<?php

namespace backend\controllers;

use yii\rbac\Rule;

class AuthorRule extends Rule
{
	public $name = 'isAuthor';

	public function execute($user_id, $item, $params) //item - роль , параметры
	{
		if(isset($params['author_id']) and ($params['author_id'] == $user_id)) {
			return true;
		} else {
			return false;
		}
	}
}