<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use App\Mail\ContactMessageReceived;
use App\Models\ContactAgent;
use App\Models\ContactMessage;
use App\Models\Property;
use App\Models\PropertyListingType;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeLandController extends Controller
{
    public function index(){
        $properties = Property::all();
        return view('homeland.index', compact('properties'));
    }

    public function property_details(Request $request, $property_id){
        // Validación y almacenamiento del formulario de contacto
        if($request->isMethod("POST") && $request->has('contact_form')){
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:50',
                'phone' => 'required|max:20|regex:/^[0-9+\-() ]+$/',
                'message' => 'required|string|max:1000',
            ],[
                'name.required' => 'The name field is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                'phone.regex' => 'The phone number format is invalid.',
                'message.required' => 'The message field is required.',
            ]);

            $contact = new ContactAgent();
            $contact->name = $request->input("name");
            $contact->email = $request->input("email");
            $contact->phone = $request->input("phone");
            $contact->message = $request->input("message");
            $contact->save();

            session()->now('message', 'Your message has been sent successfully');
        }

        // Validación y almacenamiento del formulario de reseñas
        if($request->isMethod("POST") && $request->has('review_form')){
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:50',
                'description' => 'required|string|max:1000',
                'rating' => 'required|integer|min:1|max:5',
            ],[
                'name.required' => 'The name field is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                'description.required' => 'The review description is required.',
                'rating.required' => 'The rating field is required.',
                'rating.min' => 'The rating must be at least 1 star.',
                'rating.max' => 'The rating must be at most 5 stars.',
            ]);

            $review = new Review();
            $review->name = $request->input("name");
            $review->email = $request->input("email");
            $review->description = $request->input("description");
            $review->date = now();
            $review->date = Carbon::parse($review->date);
            $review->rating = $request->input("rating");
            $review->property_id = $property_id;
            $review->save();

            session()->now('review_message', 'Your review has been submitted successfully');
        }

        $property = Property::find($property_id);
        $reviews = Review::where('property_id', $property_id)->get();
        return view('homeland.property_details', compact('property', 'reviews'));
    }

    public function contact(Request $request)
    {

        if ($request->isMethod("POST")) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:50',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|max:1000',
            ], [
                'name.required' => 'The name field is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                'subject.regex' => 'The phone number format is invalid.',
                'message.required' => 'The message field is required.',
            ]);

            $contactMessage = ContactMessage::create($request->all());

            //Enviar correo electrónico al administrador
            Mail::to('admin@homeland.com')->send(new ContactMessageReceived($contactMessage));

            return redirect()->route('contact')->with('message', 'Your message has been sent successfully.');
        }
        return view('homeland.contact');
    }



    public function about(){
        return view('homeland.about');
    }

    public function properties(){
        $properties = Property::all();
        return view('homeland.properties', compact('properties'));
    }

    public function login(){
        return view('homeland.login');
    }

    public function register(){
        return view('homeland.register');
    }

    public function buy(){
        $properties = Property::where("offer_type", "For Sale")->get();
        return view('homeland.buy', compact('properties'));
    }

    public function rent(){
        $properties = Property::where("offer_type", "For Rent")->get();
        return view('homeland.rent', compact('properties'));
    }

    public function properties_listing_type($property_listing_type_id){
        $properties = PropertyListingType::find($property_listing_type_id)->properties;
        return view('homeland.index', compact('properties'));
    }

}
