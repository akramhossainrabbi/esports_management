<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsFeed;

class NewsController extends Controller
{
    public function newsView()
    {
    	return view('Admin.news');
    }

    public function addNews(Request $request)
    {
    	$request->validate([
            'news_feed_image' => 'mimes:jpg,jpeg,png,tiff',
            'news_feed_link'=>'required',
            'news_feed_header'=>'required',
            'news_feed_sub_header'=>'required',
        ]);
        $News = new NewsFeed();

        if ($request->hasFile('news_image')) {
            $image = $request->file('news_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/news');
            $image->move($destinationPath, $name);
            $News->news_feed_image = $name;
        }
        $News->news_feed_link=$request->news_feed_link;
        $News->news_feed_header=$request->news_feed_header;
        $News->news_feed_sub_header=$request->news_feed_sub_header;
        $News->save();
        $request->session()->flash('message','Data Inserted Successfully');
        return redirect('/esport.admin.login.panel/add-news');
    }
}
