<?php

namespace App\Http\Controllers;

use App\Models\ContactAgent;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function Pest\Laravel\get;

class PropertiesAPIController extends Controller
{
    public function properties()
    {
        //return response()->json(Property::all());
        $properties = Property::with('city')->with('list_type')->get();
        return response()->json($properties);
    }

    public function saveContactAgent(Request $request){

        $validator = Validator::make($request->all(), [
            'name'    => 'required|max:50',
            'email'   => 'required|email|max:50',
            'phone'   => 'required|max:20|regex:/^[0-9+\-() ]+$/',
            'message' => 'required|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages()->toArray(), 400);
        }

        $contact = new ContactAgent();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->message = $request->input('message');
        $contact->save();

        return response()->json(["message" => "Contact saved successfully."]);
    }
}
