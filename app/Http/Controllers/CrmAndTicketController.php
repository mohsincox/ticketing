<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Crm;
use App\User;
use App\Models\TicketType;
use App\Models\TicketStatus;
use App\Models\Ticket;

class CrmAndTicketController extends Controller
{
    public function create()
    {
    	$phoneNumber = $_GET['phone_number'];
    	$crmLastRecord = Crm::where('phone_number', $phoneNumber)->orderBy('id', 'desc')->first();
    	$userList = User::where('id', '<>', 1)->pluck('name', 'id');
    	$ticketTypeList = TicketType::pluck('name', 'id');
    	$ticketStatusList = TicketStatus::pluck('name', 'id');
    	return view('crm_ticket.create', compact('crmLastRecord', 'userList', 'ticketTypeList', 'ticketStatusList'));
    }

    public function storeCrm(Request $request)
    {
    	$crm = new Crm;
        $crm->agent = $request->agent;
        $crm->phone_number = $request->phone_number;
        $crm->name = $request->name;
        $crm->gender = $request->gender;
        $crm->type_of_caller = $request->type_of_caller;
        $crm->address = $request->address;
        $crm->division = $request->division;
        $crm->category = $request->category;
        $crm->sku_price = $request->sku_price;
        $crm->service_source = $request->service_source;
        $crm->product_base_code = $request->product_base_code;
        $crm->remarks = $request->remarks;
        $crm->save();
        flash()->info($crm->phone_number.' CRM created successfully');
    	return redirect()->back();
    }

    public function storeTicket(Request $request)
    {
    	$ticket = new Ticket;
        $ticket->user_id = $request->user_id;
        $ticket->ticket_type_id = $request->ticket_type_id;
        $ticket->ticket_status_id = $request->ticket_status_id;
        $ticket->risen_from = $request->risen_from;
        $ticket->customer_name = $request->customer_name;
        $ticket->customer_phone_number = $request->customer_phone_number;
        $ticket->customer_address = $request->customer_address;
        $ticket->division = $request->division;
        $ticket->product_base_code = $request->product_base_code;
        $ticket->description = $request->description;
        $ticket->agent = $request->agent;
        $ticket->save();
        flash()->info($ticket->customer_phone_number.' Ticket created successfully');
    	return redirect()->back();
    }
}
