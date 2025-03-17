<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:3000/api/v1/employees');
        $employees = $response->object();
        return view('homeland.admin.employees.index', compact('employees'));
        //dd($response->object());
    }
}
