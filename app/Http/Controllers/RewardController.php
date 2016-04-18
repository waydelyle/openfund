<?php namespace App\Http\Controllers;

use App\Reward;
use App\Project;
use App\Http\Requests;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    /**
     * Add a new reward to a project.
     *
     * @param Request $request
     * @param $id
     */
    public function create(Request $request, $id){
        $postedRewardData = $request->all();

        if(!empty($postedRewardData)){

            $reward = new Reward();

            if(!$reward->create([
                'project_id' => $id,
                'description' => $postedRewardData['inputProjectDescription'],
                'amount' => $postedRewardData['inputProjectFunding']
            ]));

            return redirect("/project-edit/$id");
        }

        return view('rewards.create', [
            'heading' => 'Create Reward'
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function edit(Request $request, $id){
        $postedRewardData = $request->all();

        $reward = Reward::find($id);

        if(!empty($postedRewardData)){

            if(!$reward->update([
                'project_id' => $id,
                'description' => $postedRewardData['inputProjectDescription'],
                'amount' => $postedRewardData['inputProjectFunding']
            ]));

            return redirect("/project-edit/$id");
        }

        return view('rewards.create', [
            'heading' => 'Create Reward'
        ]);
    }

    public function delete(){

    }
}
