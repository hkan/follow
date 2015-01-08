<?php namespace Hkan\Follow\Traits;

use Hkan\Follow\Facades\Follow;

/**
 * Class FollowTrait
 * @package Hkan\Follow\Traits
 */
trait FollowTrait {

	/**
	 * @return mixed
	 */
	public static function mostFollowed()
	{
		return User::leftJoin(Follow::pivotTable() . ' AS uf', 'uf.follow_id', '=', Follow::usersTable() . '.id')
			->groupBy('uf.follow_id')
			->having(DB::raw('COUNT(uf.follow_id)'), '>', 0)
			->orderBy(DB::raw('COUNT(uf.follow_id)'), 'desc');
	}

	/**
	 * @return mixed
	 */
	public function followings()
	{
		return $this->belongsToMany(
			Follow::userModel(),
			Follow::pivotTable(),
			'user_id',
			'follow_id'
		);
	}

	/**
	 * @return mixed
	 */
	public function followers()
	{
		return $this->belongsToMany(
			Follow::userModel(),
			Follow::pivotTable(),
			'follow_id',
			'user_id'
		);
	}

	/**
	 * @param $user
	 * @return bool
	 */
	public function isFollowedBy($user)
	{
		if (is_a($user, Follow::userModel()))
		{
			$user = $user->id;
		}

		return $this->followers()->where('user_id', $user)->count() > 0;
	}

	/**
	 * @param $user
	 * @return bool
	 */
	public function isFollowing($user)
	{
		if (is_a($user, Follow::userModel()))
		{
			$user = $user->id;
		}

		return $this->followings()->where('follow_id', $user)->count() > 0;
	}

	/**
	 * @param $user
	 */
	public function follow($user)
	{
		if (is_a($user, Follow::userModel()))
		{
			$user = $user->id;
		}

		$this->followings()->attach($user);
	}

	/**
	 * @param $user
	 */
	public function unfollow($user)
	{
		if (is_a($user, Follow::userModel()))
		{
			$user = $user->id;
		}

		$this->followings()->detach($user);
	}

	/**
	 * @return mixed
	 */
	public function getFollowerCountAttribute()
	{
		return $this->followers()->count();
	}

	/**
	 * @return mixed
	 */
	public function getFollowingCountAttribute()
	{
		return $this->followings()->count();
	}

}
