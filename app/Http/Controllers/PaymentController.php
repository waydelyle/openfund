<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PaymentController extends Controller
{
    /**
     * @param $rewardId
     */
    public function makePayment($rewardId){

        return redirect("/project/{id}/reward");
    }
}
