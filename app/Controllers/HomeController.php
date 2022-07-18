<?php
// Coding hand :https://github.com/Gadrawingz
// Gad-Iradufasha's coding -> @gadrawingz, @donnekt
namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {

        $data = [
            'page_title' => "Cereal Program Management System",
            'page_subtitle' => "In Rwanda, the favorite cereal is rice...",
            'page_content' => "This system is for RAB (Rwanda Agriculture Board) to manage cereals and related plants that are grown to produce grain such as Wheat, Rice, Oats, Rye, Sorghum, and such. which are given to farmers",
            'page_footer' => date('Y')." - All rights reserved.",
        ];

        return view('main/home', $data);
    }
}
