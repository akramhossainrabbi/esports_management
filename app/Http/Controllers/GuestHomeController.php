<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsFeed;
use App\Contact;


class GuestHomeController extends Controller
{
    public function guestView()
    {
    	$news_feed = NewsFeed::get();
        return view('home.guest-home')
        	->with('newses',$news_feed);
    }
    public function contactSend(Request $request)
    {
        if ($request->ajax()) {

            $contact = new Contact();

            $contact->contact_name=$request->contact_name;
            $contact->contact_email=$request->contact_email;
            $contact->contact_subject=$request->contact_subject;
            $contact->contact_messege=$request->contact_messege;
            $contact->save();
            return response()->json(['success'=>'Your message has been sent. Thank you!']);
        }

    }
    public function PrivacyPolicy(Request $request)
    {
      return view('home.privacy');
    }
    public function TermsConditions(Request $request)
    {
      return view('home.terms_and_conditions');
    }
    public function Services(Request $request)
    {
        return view('home.services');
    }
    public function AboutUs(Request $request)
    {
        return view('home.about_us');
    }

}
