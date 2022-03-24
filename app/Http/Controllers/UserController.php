<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;

class UserController extends Controller
{
    /**
     * Show the form for editing the user profile
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getProfile()
    {
        $data['user'] = Auth::user();
        return view('users.profile',$data);
    }

    /**
     * Update the user profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(ProfileRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = Auth::user();
            if(request()->hasFile('image')){
                if($user->image != ''){
                    Storage::disk('public')->delete($user->image);
                }
                $path = Storage::disk('public')->putFile(
                    'files/',
                    $request->file('image')
                );
                $user->image = $path;
                $user->save();
            }
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'bio' => $request->bio,
                'address' => $request->address
            ]);
            DB::commit();
            Flash::success('Profile updated successfully.');
        } catch (\Exception $e){
            DB::rollBack();
            $message = 'Failed to update profile.';
            if (env('APP_DEBUG'))
                $message = $e->getMessage() . 'Line #' . $e->getLine();

            Flash::error($message);
        }
        return redirect()->back();
    }
}
