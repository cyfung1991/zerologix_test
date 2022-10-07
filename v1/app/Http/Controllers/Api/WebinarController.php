<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Webinar;
use App\Models\UserFavouriteWebinar;

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
        $user_favourited_webinar = UserFavouriteWebinar::withTrashed()->where($target_array)->first();
        if ($user_favourited_webinar === null ){
            $fav_webinar = new UserFavouriteWebinar($target_array);
            $fav_webinar->save();
        }else if( $user_favourited_webinar->trashed() ){
            $user_favourited_webinar->restore();
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
        $user_favourited_webinar = UserFavouriteWebinar::where($target_array)->first();

        if ($user_favourited_webinar === null ){
            return response()->json([
                'error' => true ,
                'msg' => 'You haven\'t favourite this webinar before!'
            ]);
        }else{
            UserFavouriteWebinar::where('id', $user_favourited_webinar->id)->delete();
        }

        return response()->json([
            'error' => false,
            'msg' => 'Webinar unfavourited!'
        ]);
    }

    public function getFavouriteList(Request $request)
    {
        $userId = auth('sanctum')->user()->id ?? false;
        if(!$userId) return response()->json( ['error' => true, 'msg' => 'No this user'], 500 );

        $user_favourited_webinar_list = User::with('favouriteWebinars')->find($userId);
        return response()->json($user_favourited_webinar_list->favouriteWebinars);
    }

    public function getWebinarList(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'per_page' => 'required|integer|min:1',
            'page' => 'required|integer|min:1',
        ]);
        if( $validator->fails() ){
            return response()->json($validator->messages(), 400);
        }

        $list = Webinar::paginate($request->per_page);
        return response()->json($list);
    }

}
