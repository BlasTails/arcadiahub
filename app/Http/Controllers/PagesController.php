<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Detail;
use App\Post;
use App\User;
use DB;


class PagesController extends Controller
{
    //Homepage
    public function index()
    {
        return view('pages.index');
    }
    
    //About
    public function About()
    {
        return view('pages.About');
    }
    
    //sign in
    public function sign()
    {
        return view('pages.sign');
    }
    
    //Startup Dash
    public function Membership()
    {
        return view('pages.Membership');
    }
    
    //Startup Dash
    public function StartupSettings()
    {
        return view('pages.StartupSettings');
    }
    
     //Startup Dash
    public function startup()
    {
        //$details = Detail::orderBy('address','country','user_details','profile_image')->paginate(10);
        $details = Detail::all();
        //$users = Users::orderBy('name')->paginate(10);
        return view('dashboard')->with('details', $details);
    }
    
     //Investor Dash
    public function investor()
    {
        return view('InvestorDashboard');
    }
    
     //Admin Dash
    public function admin()
    {
        return view('adminDash');
    }

     //Investor Profile 
     public function InvestorProfile()
     {
        $user_id = auth()->user()->id;
        $user = User::find($user_id)->posts()->paginate(2);
        $users = DB::table('users')
                    ->leftJoin('details', 'users.id', '=', 'details.user_id')
                    ->where('details.user_id','=',$user_id)
                    ->get();
        return view('investorPosts.InvestorProfile', compact('users'))->with('posts', $user, $users);
     }

    //Testing routes for investor register
    //Investor Register
    /*public function investorRegister()
    {
        return view('auth.investorRegister');
    }*/
    
    
}
