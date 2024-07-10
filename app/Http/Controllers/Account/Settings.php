<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Settings extends Controller
{


    public function MyAccount(){
        return view('account._my_account');
    }
}
