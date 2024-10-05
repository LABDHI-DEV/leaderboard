<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Activity;
use App\Models\UserActivity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::with(['activities' => function ($a) {
            $a->where(['is_calculated' => 1]);
        }])
        ->withCount('activities')
        ->whereNotNull('rank');

        /*----Get data based on sort by filter----*/

        if (!empty($request->sort_by)) {
            switch ($request->sort_by) {
                case 'Day':
                    $query = $query->whereHas('activities', function($a){
                        $a->whereDate('date_time', date('Y-m-d'));
                    });
                    break;
                case 'Month':
                    $query = $query->whereHas('activities', function($a){
                        $a->whereMonth('date_time', date('m'))->whereYear('date_time', date('Y'));
                    });
                    break;
                case 'Year':
                    $query = $query->whereHas('activities', function($a){
                        $a->whereYear('date_time', date('Y'));
                    });
                    break;                
                default:
                    break;
            }
            
            /*----Get data based on sort by & search filter----*/
            if (!empty($request->user_id)) {
                $query = $query->where(['id' => $request->user_id]);
            }
        }

        /*----Get data based on search filter----*/

        if (!empty($request->user_id)) {
            $query->orderByRaw("CASE WHEN id = ? THEN 0 ELSE 1 END", [$request->user_id]);
        }

        
        $getUserData = $query->orderBy('activities_count', 'desc')->get();        
        return view('leaderboard', compact('getUserData'));
    }


    public function reCalculate()
    {
        UserActivity::where('is_calculated', 0)->update([
            'is_calculated' => 1
        ]);

        /*----Get data based on activity count----*/
        $users = User::withCount('activities')->orderBy('activities_count', 'desc')->get();

        /*----Set Rank----*/
        $rank = 1;
        $previousCount = null;

        foreach ($users as $key => $user) {
            if ($user->activities_count !== $previousCount) {
                User::where('id', $user->id)->update([
                    'rank' => $rank
                ]);
                $rank++;
            } else {
                User::where('id', $user->id)->update([
                    'rank' => $rank - 1
                ]);
            }
            $previousCount = $user->activities_count;
        }
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
