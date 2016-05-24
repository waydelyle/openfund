<?php namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\PaymentRepository;

class PaymentController extends Controller
{
    /**
     * @param $rewardId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function makePayment($rewardId){

        return redirect("/campaign/{id}/reward");
    }

    public function pay(Request $request, $campaignId = null){
        if( ! $request->has('amount') || empty($campaignId)){
            return redirect('/');
        }

        $paymentRepository = new PaymentRepository();
        $paymentId = $paymentRepository->validateAndCreate([
            'user_id' => Auth::user()->id,
            'campaign_id' => $campaignId,
            'amount' => $request->get('amount'),
        ]);

        return redirect("/payment-successful/$paymentId");
    }

    public function success(Request $request){
        return view('payments.payment-success');
    }
}