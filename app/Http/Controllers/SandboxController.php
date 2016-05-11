<?php

namespace App\Http\Controllers;

use App\Modules\CampaignModule;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * All testing is done in this controller
 *
 * Class SandboxController
 * @package App\Http\Controllers
 */
class SandboxController extends Controller
{
    public function campaignModule(){
        return view('sandbox.index');
    }
}
