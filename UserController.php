<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user = User::latest()->get();
           return DataTables::of($user)
            ->addIndexColumn()
            ->addColumn('Status', function($row){


                $btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-sm">Active</a>';
                //$btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                //$btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-danger btn-sm">Delete</a>';

                 return $btn;
         })
         ->rawColumns(['Status'])
         ->make(true);
}

    
        return view('users');
    }
}
