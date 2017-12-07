<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\TicketStatus;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userCount = User::count();
        $ticketCount = Ticket::count();
        $ticketTypeCount = TicketType::count();
        $ticketType1DistributorCount = Ticket::where('ticket_type_id', 1)->count();
        $ticketType2MarketingCount = Ticket::where('ticket_type_id', 2)->count();
        $ticketType3ProductCount = Ticket::where('ticket_type_id', 3)->count();
        $ticketType4RetailerCount = Ticket::where('ticket_type_id', 4)->count();
        $ticketType5PackageCount = Ticket::where('ticket_type_id', 5)->count();
        $ticketStatusCount = TicketStatus::count();
        $ticketStatusNewCount = Ticket::where('ticket_status_id', 1)->count();
        $ticketStatusAnswerCount = Ticket::where('ticket_status_id', 2)->count();
        $ticketStatusPendingCount = Ticket::where('ticket_status_id', 3)->count();
        $ticketStatusClosedCount = Ticket::where('ticket_status_id', 4)->count();
        return view('home', compact('userCount', 'ticketTypeCount', 'ticketCount', 'ticketStatusCount', 'ticketType1DistributorCount', 'ticketType2MarketingCount', 'ticketType3ProductCount', 'ticketType4RetailerCount', 'ticketType5PackageCount', 'ticketStatusNewCount', 'ticketStatusAnswerCount', 'ticketStatusPendingCount', 'ticketStatusClosedCount'));
    }

    public function indexBu()
    {
        return view('home_bu');
    }

     public function dbConn()
    {
        return view('db_commection_asterisk');
    }
}
