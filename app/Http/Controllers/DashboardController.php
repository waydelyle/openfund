<?php

namespace App\Http\Controllers;

use Auth;
use App\Campaign;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(){
        $campaigns = Campaign::ByUserId(Auth::user()->id)->get();

        return view('dashboard.my-campaigns', [
            'heading' => 'My campaigns',
            'campaigns' => $campaigns
        ]);
    }

    /**
     * Show all of the message threads to the user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function messages(){
        $currentUserId = Auth::user()->id;
        // All threads, ignore deleted/archived participants
        $threads = Thread::getAllLatest()->get();
        // All threads that user is participating in
        // $threads = Thread::forUser($currentUserId)->latest('updated_at')->get();
        // All threads that user is participating in, with new messages
        // $threads = Thread::forUserWithNewMessages($currentUserId)->latest('updated_at')->get();
        return view('dashboard.messages', [
            'heading' => 'Inbox',
            'threads' => $threads,
            'currentUserId' => $currentUserId
        ]);
    }

    public function notifications(){
        return view('dashboard.notifications', [
            'heading' => 'Notifications'
        ]);
    }
}
