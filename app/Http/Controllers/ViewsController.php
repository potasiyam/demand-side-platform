<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function getHomeView()
    {
        return view('home');
    }

    public function getCampaignCreateView()
    {
        return view('create');
    }

    public function getCampaignEditView($campaignId)
    {
        return view('edit', compact('campaignId'));
    }
}
