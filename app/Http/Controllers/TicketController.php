<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\TicketStatus;

class TicketController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$tickets = Ticket::with(['user', 'ticketType', 'ticketStatus'])->orderBy('id', 'desc')->get();
    	return view('ticket.index', compact('tickets'));
    }

    public function create()
    {
    	return view('ticket.create');
    }

    public function store(Request $request)
    {
    	$input = Input::all();
	    $rules = [
	    	'user_id' => 'required',
	    	'ticket_type_id' => 'required',
	    	'ticket_status_id' => 'required'
	    ];
	    $messages = [
            'user_id.required' => 'The Select Assign To field is required.',
            'ticket_type_id.required' => 'The Select Ticket Type field is required.',
            'ticket_status_id.required' => 'The Select Ticket Status field is required.'
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $ticketStatus = new Ticket;
        $ticketStatus->name = $request->name;
        $ticketStatus->created_by = Auth::id();
        $ticketStatus->save();
        flash()->success($ticketStatus->name.' Ticket Status created successfully');
    	return redirect('ticket-status');
    }

    public function edit($id)
    {
    	$ticketStatus = Ticket::find($id);
    	return view('ticket_status.edit', compact('ticketStatus'));
    }
    
    public function update(Request $request, $id)
    {
    	$ticketStatus = Ticket::find($id);
    	$input = Input::all();
	    $rules = [
	    	'name' => 'required|unique:ticket_statuses,name,'.$ticketStatus->id,
	    ];
	    $messages = [
            'name.required' => 'The Ticket Status field is required.',
            'name.unique' => 'The Ticket Status already exist.'
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $ticketStatus->name = $request->name;
        $ticketStatus->updated_by = Auth::id();
        $ticketStatus->save();
        flash()->success($ticketStatus->name.' Ticket Status updated successfully');
    	return redirect('ticket-status');
    }
}
