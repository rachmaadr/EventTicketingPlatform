<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\category;


class HomeController extends Controller
{
    //
    public function index(){
        $events = $this->fetchEvents();
        $categories = $this->fetchCategories();
        return view('front.index', compact('events', 'categories'));
    }

    private function fetchEvents(){
        $category = request()->query('category');

        $events = event::upcoming();

        if(!request()->query('all_events')){
            $events->limit(3);
        }

        if($category){
            $events->withCategory($category);
        }
        return $events->get();
    }

    private function fetchCategories(){
        $categories = category::sortbyMostEvents();

        if(!request()->query('all_categories')){
            $categories -> limit(4);
        }
        return $categories->get();
    }
}
