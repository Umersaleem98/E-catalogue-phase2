<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('index', compact('events'));
    }

    public function Team_index()
    {
        $teams = Team::all();
        $events = Event::all();
        return view('template.teams.teams', compact('teams', 'events'));
    }

    public function About_team($id)
    {
        $teams = Team::find($id);
        $events = Event::all();
        return view('template.teams.meet_our_team', compact('teams', 'events'));
    }

    public function RMO()
    {
        // $teams = Team::all();
        // $events = Event::all();
        return view('template.r_m_o');
    }

    public function signrature_program_index()
    {
        // $teams = Team::all();
        // $events = Event::all();
        return view('template.signrature_program');
    }
   
    public function nust_trust_foundations()
    {
        // $teams = Team::all();
        // $events = Event::all();
        return view('template.nusttrustfoundations');
    }

    public function about_us_index()
    {
        // $teams = Team::all();
        // $events = Event::all();
        return view('template.about_us');
    }

    public function contact_us_index()
    {
        // $teams = Team::all();
        // $events = Event::all();
        return view('template.contact_us');
    }
}
