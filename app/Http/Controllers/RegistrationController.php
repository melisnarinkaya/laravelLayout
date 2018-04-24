<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegistrationForm;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\User;
use App\Mail\Welcome;



class RegistrationController extends Controller
{
    public function create(){
            return view('registration.create');
    }

    public function store(RegistrationForm $request){


       // $form->persist();
        //Validate the form
        $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed'
        ]);

        //Create and save the user
        $user=User::create([
            'name' => request()->get('name'),
            'email' => request()->get('email'),
            'password' => Hash::make(request()->get('password')), /* passwordu database'e kod şeklinde kaydediyor*/
        ]);


        //Sign them in
       auth()->login($user);

        Mail::to($user)->send(new Welcome($user));

        session()->flash('message','Thanks so much for signing up!');

        //Redirect to the home page
        return redirect()->home();


    }

}
