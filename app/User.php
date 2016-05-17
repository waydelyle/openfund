<?php namespace App;

use Cmgmyr\Messenger\Models\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cmgmyr\Messenger\Traits\Messagable;

/**
 * Class User
 * @package App
 */
class User extends Authenticatable
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @param $query
     * @param $email
     * @return mixed
     */
    public function scopeByEmail($query, $email)
    {
        return $query->where('email', $email);
    }

    /**
     * Returns the new messages count for user.
     *
     * @return int
     */
    public function newMessagesCount()
    {
        return count($this->threadsWithNewMessages());
    }

    /**
     * Returns all threads with new messages.
     *
     * @return array
     */
    public function threadsWithNewMessages()
    {
        $threadsWithNewMessages = [];

        $participants = Models::participant()->where('user_id', $this->id)->lists('last_read', 'thread_id');

        /**
         * @todo: see if we can fix this more in the future.
         * Illuminate\Foundation is not available through composer, only in laravel/framework which
         * I don't want to include as a dependency for this package...it's overkill. So let's
         * exclude this check in the testing environment.
         */
        if (getenv('APP_ENV') == 'testing' || !str_contains(\Illuminate\Foundation\Application::VERSION, '5.0')) {
            $participants = $participants->all();
        }

        if ($participants) {
            $threads = Models::thread()->whereIn('id', array_keys($participants))->get();

            foreach ($threads as $thread) {
                if ($thread->updated_at > $participants[$thread->id]) {
                    $threadsWithNewMessages[] = $thread->id;
                }
            }
        }

        return $threadsWithNewMessages;
    }
}
