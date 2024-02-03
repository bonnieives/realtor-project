<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class MyUserController extends Controller
{
    public function store (Request $request)
    {
        try {

            Log::info('Incoming request data:', $request->all());

            $validateData = $request->validate([
                'CategoryId' => 'required|in:1,2,3,4',
                'FirstName' => 'required|string',
                'LastName' => 'required|string',
                'Email' => 'required|email',
                'Password' => 'required|string|min:8|max:20',
            ]);

            $validateData['CategoryId'] = (int)$validateData['CategoryId'];
            $validateData['Password'] = Hash::make($validateData['Password']);

            $existsCategoryId = Users::where('Email', $validateData['Email'])
                ->where('CategoryId',$validateData['CategoryId'])
                ->first();
    
            if($existsCategoryId) {
                return redirect('/')->with('error','User already has one account of this category.');
            }

            $user = Users::create($validateData);
    
            if (!$user) {
                \Log::error('User creation failed');
                return response()->json(['error' => 'User creation failed'], 500);
            }
    
            //return response()->json(['message' => 'User created succssfully', 'user' => $user]);

            return redirect('/')->with('success', 'User created successfully');

        } catch (\Exception $e) {
            Log::error('Excheption during user creation: ', ['message' => $e->getMessage()]);
            return response()->json(['error' => 'User creation failed'], 500);
        }

    }
}
