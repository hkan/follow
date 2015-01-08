# Follow
User following package for Laravel 4.

## Usage
Migrate to database

    php artisan migrate --package="hkan/follow"
    
Then add the trait to your `User` model.

    use \Hkan\Follow\Traits\FollowTrait;
