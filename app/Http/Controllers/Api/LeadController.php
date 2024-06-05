<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request){

        $data = $request->all();

        $validator = Validator::make($data,
            [
                'name' => 'required|min:3|max:100',
                'email' => 'required|email',
                'message' => 'nullable|max:500',
            ],
            [
                'name.required' => 'The name is required',
                'name.min' => 'The name must have at least :min characters',
                'name.max' => 'The name must have no more than :max characters',
                'email.required' => 'The email is required',
                'email.email' => 'The email must be a valid email address',
                'message.required' => 'The message is required',
                'message.max' => 'The message must have no more than :max characters',
            ]
            );

            if ($validator->fails()) {
                $success = false;
                $errors = $validator->errors();

            }

            $success = true;

            return response()->json(compact('success', 'errors'));
    }
}
