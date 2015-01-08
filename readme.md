# Follow
User follow system for Laravel 4.

## Installation
Add the following line to your `composer.json`'s `require` array.

    "hkan/follow": "dev-master"

Migrate to database

    php artisan migrate --package="hkan/follow"

Copy the following line to the `providers` array of `app/config/app.php`

    'Hkan\Follow\FollowServiceProvider'

Add the trait to your `User` model.

    use \Hkan\Follow\Traits\FollowTrait;

## Usage

#### Follow and unfollow users

    $user->follow($prettyGirl)
    $user->unfollow($belieberGirl)
    
#### Check if following or being followed by someone

    $user->isFollowing($someDude)
    $user->isFollowedBy($creepyDude)

#### Followers and followings relations

    $user->followers()
    $user->followings()
    
    $user->follower_count // Shortcut for $user->followers()->count()
    $user->following_count // Shortcut for $user->followings()->count()

#### Bonus: Most followed user(s)

    User::mostFollowed()->first() // Most followed user
    User::mostFollowed()->take(10)->get() // Most followed 10 users
