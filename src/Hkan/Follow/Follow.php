<?php namespace Hkan\Follow;

class Follow {

	public function pivotTable()
	{
		return app('config')->get('follow::table');
	}

	public function userModel()
	{
		return app('config')->get('follow::user_model');
	}

	public function usersTable()
	{
		$userModel = $this->userModel();

		return with(new $userModel)->getTable();
	}

}
