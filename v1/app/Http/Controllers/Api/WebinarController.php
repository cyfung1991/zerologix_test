<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Webinar;

class WebinarController extends Controller
{
    // public function __construct(Request $request) {
    //     $userId = auth('sanctum')->user()->id ?? false;
    //     var_dump($userId);
    //     if(!$userId){
    //         return response()->json( ['error' => true, 'msg' => 'No this user'], 500 );
    //         exit();
    //     }
    // }

    public function favouriteWebinar(Request $request, $id)
    {
        $userId = auth('sanctum')->user()->id ?? false;
        $webinar = Webinar::where('id', $id)->first();

        // Basic checking
        if(!$userId) return response()->json( ['error' => true, 'msg' => 'No this user'], 500 );
        if(!$webinar) return response()->json( ['error' => true, 'msg' => 'No this webinar'], 500 );

        $target_array = [
            'user_id' => $userId,
            'webinar_id' => $webinar->id
        ];
        $user_favourited_webinar = \DB::table('user_favourited_webinar')->where($target_array)->first();

        if ($user_favourited_webinar === null ){
            $target_array['created_at'] = \Carbon\Carbon::now();
            \DB::table('user_favourited_webinar')->insert($target_array);
        }else{
            \DB::table('user_favourited_webinar')->where('id', $user_favourited_webinar->id)->update([
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => null
            ]);
        }
        return response()->json([
            'error' => false,
            'msg' => 'Webinar favourited!'
        ]);
    }

    public function unfavouriteWebinar(Request $request, $id)
    {
        $userId = auth('sanctum')->user()->id ?? false;
        $webinar = Webinar::where('id', $id)->first();

        // Basic checking
        if(!$userId) return response()->json( ['error' => true, 'msg' => 'No this user'], 500 );
        if(!$webinar) return response()->json( ['error' => true, 'msg' => 'No this webinar'], 500 );

        $target_array = [
            'user_id' => $userId,
            'webinar_id' => $webinar->id
        ];
        $user_favourited_webinar = \DB::table('user_favourited_webinar')->where($target_array)->first();

        if ($user_favourited_webinar === null ){
            return response()->json([
                'error' => true ,
                'msg' => 'You haven\'t favourite this webinar before!'
            ]);
        }else{
            \DB::table('user_favourited_webinar')->where('id', $user_favourited_webinar->id)->update(['deleted_at' => \Carbon\Carbon::now()]);
        }

        return response()->json([
            'error' => false,
            'msg' => 'Webinar unfavourited!'
        ]);
    }

    public function getFarouriteList(Request $request)
    {
        $userId = auth('sanctum')->user()->id ?? false;
        if(!$userId) return response()->json( ['error' => true, 'msg' => 'No this user'], 500 );

        $user_favourited_webinar_list = User::find($userId);
        dd($user_favourited_webinar_list->favouriteWebinar);
    }
}
