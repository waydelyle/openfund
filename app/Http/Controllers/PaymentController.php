<?php namespace App\Http\Controllers;

use App\Services\PaymentService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * @param $rewardId
     */
    public function makePayment($rewardId){

        return redirect("/project/{id}/reward");
    }

    public function pay(Request $request, $projectId = null){
        if( ! $request->has('amount') || empty($projectId)){
            return redirect('/');
        }

        $paymentService = new PaymentService();
        $paymentId = $paymentService->createPayment([
            'user_id' => Auth::user()->id,
            'project_id' => $projectId,
            'amount' => $request->get('amount'),
            'reward_id' => 2
        ]);

        return redirect("/payment-successful/$paymentId");
    }

    public function success(Request $request){
        return view('payments.payment-success');
    }
}
