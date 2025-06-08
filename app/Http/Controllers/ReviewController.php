<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\Restaurant;

class ReviewController extends Controller
{
    public function index(Restaurant $restaurant){
        if(Auth::user()->subscribed('premium_plan')){
            $reviews = Review::where('restaurant_id', $restaurant->id)->orderBy('created_at', 'desc')->paginate(5);
        }
    }
}
