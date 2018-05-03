<?php

namespace App\Http\Controllers;

use App\Http\Request;
//use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUser;

class AdministratorsController extends Controller
{
    use AuthenticatesUser;
    
    protected $loginview = ' admnistrators.login';
}
