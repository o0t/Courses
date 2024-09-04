<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Main_categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Settings extends Controller
{


    public function MyAccount(){
        $categories = Main_categories::all();
        return view('account._my_account',compact('categories'));
    }

    public function UpdateAccount(Request $request){


        $valiUsername = $request->has('username') && $request->input('username') !== $request->user()->username
            ? Validator::make($request->all(), [
                'username' => 'required|string|unique:users',
            ], [
                'username.unique' => __('The username has already been taken.')
            ])
            : null;

        $valiemail = $request->has('email') && $request->input('email') !== $request->user()->email
            ? Validator::make($request->all(), [
                'email' => 'required|string|unique:users',
            ], [
                'email.unique' => __('The email has already been taken.')
            ])
            : null;

        $validator = Validator::make($request->all(), []);

        if ($validator->fails() || ($valiUsername && $valiUsername->fails()) || ($valiemail && $valiemail->fails())) {
            $firstError = $valiUsername?->errors()->first('username')
                ?? $valiemail?->errors()->first('email')
                ?? $validator->errors()->first();
            toast($firstError, 'error');
            return back()->withErrors($validator)->withInput();
        } else {
            $UserName = $request->input('username');
            $Email = $request->input('email');
        }

        $validatorData = Validator::make($request->all(), [
            'first_name'             =>  'required|string|min:3|max:20',
            'last_name'             =>  'required|string|min:3|max:20',
            'phone'                 =>  'required|min:10|max:11',
            'about'                 =>  'nullable|string|min:3|max:500',
        ]);


        if ($validatorData->fails()) {
            toast(__('Data entry error'),'error');
            return back()->withErrors($validatorData)->withInput();
        }

        if ($request->hasFile('avatar')) {

            $image = $request->file('avatar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/user_avatar', $imageName);


             $validatorData = Validator::make($request->all(), [
                'avatar'   =>  'image|max:2048|mimes:jpeg,png,jpg',
             ]);


        }else{
            $imageName = Auth::user()->avatar;
        }


        $public_profile = $request->public_profile == 'on' ? 'on' : 'off';


        User::find(Auth::user()->id)->update([
            'first_name'    => $request->first_name,
            'last_name'    => $request->last_name,
            'phone'        => $request->phone,
            'about'        => $request->about,
            'username'     => $UserName,
            'email'        => $Email,
            'avatar'       => $imageName,
            'public_profile'=> $public_profile
        ]);

        toast(__('Data updated successfully'),'success');

        return back();
    }
}
