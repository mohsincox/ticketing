<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\TicketStatus;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Input;

class TicketController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        $userAuth = Auth::user();
        $idAuth = $userAuth->id;
        $roleAuth = $userAuth->role;
        if ($roleAuth == 'user') {
            $tickets = Ticket::with(['user', 'ticketType', 'ticketStatus'])->where('user_id', $idAuth)->orderBy('id', 'desc')->get();
        } else {
            $tickets = Ticket::with(['user', 'ticketType', 'ticketStatus'])->orderBy('id', 'desc')->get();
        }

    	return view('ticket.index', compact('tickets'));
    }

    public function edit($id)
    {
    	$ticket = Ticket::find($id);
        $ticketStatusList = TicketStatus::where('id', '<>', 4)->pluck('name', 'id');
    	return view('ticket.edit', compact('ticket', 'ticketStatusList'));
    }
    
    public function update(Request $request, $id)
    {
    	$input = Input::all();
	    $rules = [
	    	'ticket_status_id' => 'required'
	    ];
	    $messages = [
            'ticket_status_id.required' => 'The Ticket Status field is required.'
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $ticket = Ticket::find($id);
        $ticket->ticket_status_id = $request->ticket_status_id;
        $ticket->updated_by = Auth::id();
        $ticket->save();
        flash()->success('Ticket updated successfully');
    	return redirect('ticket');
    }
}
