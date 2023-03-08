<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Faker\Provider\sr_Cyrl_RS\Person;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function displayHome()
    {
        $p = new Personne();
        $p->name = "Yassine";

        return view("home", ['person' => $p]);
    }


}