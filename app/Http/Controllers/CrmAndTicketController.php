<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Crm;
use App\User;
use App\Models\TicketType;
use App\Models\TicketStatus;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\SkuProduct;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require '/../../../vendor/autoload.php';

class CrmAndTicketController extends Controller
{
    public function create(Request $request)
    {
        $number=preg_replace('/\D/', '',  $request->phone_number);          //  Deleting Non Numeric Characters
        if(substr($number, 0, 1) == "+" ) $number=substr($number, 1);       //  Deleting + if in First Position
        if(substr($number, 0, 2) == "88") $number=substr($number, 2);       //  Deleting 8 if in First Two Position
        if(substr($number, 0, 2) == "00") $number=substr($number, 2);       //  Deleting 0 if in First Two Position
        if(substr($number, 0, 1) == "0" ) $number=substr($number, 1);       //  Deleting 0 if in First Position

        $agent = isset($request->agent) ? $request->agent : 'Call Center';
        $agentCon = $agent;
    	$phoneNumberCon = $number;
        $crmLastRecord = Crm::where('phone_number', $phoneNumberCon)->orderBy('id', 'desc')->first();
        $ticketLastRecord = Ticket::where('customer_phone_number', $phoneNumberCon)->orderBy('id', 'desc')->first();
    	$crmRecords = Crm::where('phone_number', $phoneNumberCon)->orderBy('id', 'desc')->take(3)->get();
    	$userList = User::where('id', '<>', 1)->pluck('name', 'id');
    	$ticketTypeList = TicketType::pluck('name', 'id');
        $ticketStatusList = TicketStatus::pluck('name', 'id');
    	$categoryList = Category::pluck('name', 'id');
    	return view('crm_ticket.create', compact('crmLastRecord', 'userList', 'ticketTypeList', 'ticketStatusList', 'agentCon', 'phoneNumberCon', 'crmRecords', 'ticketLastRecord', 'categoryList'));
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
        $crm->product_batch_code = $request->product_batch_code;
        $crm->remarks = $request->remarks;
        $crm->save();
        flash()->info($crm->phone_number.' CRM created successfully');
    	return redirect('crm-ticket/create?phone_number='.$request->phone_number.'&agent='.$request->agent);
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
        $ticket->product_batch_code = $request->product_batch_code;
        $ticket->description = $request->description;
        $ticket->agent = $request->agent;
        $ticket->save();

        $user = User::find($request->user_id);
        //$users = User::whereIn('id', [2, 3])->get();

        $ticketNew = Ticket::with(['ticketType', 'ticketStatus'])->find($ticket->id);

        $mail = new PHPMailer(true);                             
        try {
                                       
            $mail->isSMTP();                                      
            $mail->Host = 'smtp.gmail.com';  
            $mail->SMTPAuth = true;                               
            $mail->Username = 'mohsincse2015@gmail.com';                 
            $mail->Password = 'mohsincse123';                          
            $mail->SMTPSecure = 'tls';                            
            $mail->Port = 587;  

            
            $mail->setFrom('from@example.com', 'myolbd.com');
            $mail->addAddress($user->email, $user->name);     
             
            // foreach($users as $user)
            // {
            //    $mail->addAddress($user->email, $user->name);
            // }
           
            $mail->addReplyTo('info@example.com', 'Information');
           
            $mail->isHTML(true);                                 
            $mail->Subject = 'Ticket_' . date("Y-m-d");
            $mail->Body    = "Ticket Type: <b>".$ticketNew->ticketType->name."</b><br>
                            Ticket Status: <b>".$ticketNew->ticketStatus->name."</b><br>
                            Customer Phone Number: <b>".$ticketNew->customer_phone_number."</b><br>
                            Customer Name: <b>".$ticketNew->customer_name."</b><br>
                            Customer Address: <b>".$ticketNew->customer_address."</b><br>
                            Division: <b>".$ticketNew->division."</b><br>
                            Description: <b>".$ticketNew->description."</b>";
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }

        flash()->info($ticket->customer_phone_number.' Ticket created & Mail sent successfully');
    	return redirect()->back();
    }

    public function updateTicket(Request $request)
    {
        $ticket = Ticket::find($request->ticket_id);
        $ticket->ticket_type_id = $request->ticket_type_id;
        $ticket->ticket_status_id = $request->ticket_status_id;
        $ticket->save();

        flash()->info('Ticket updated successfully');
        return redirect()->back();
    }

    public function categoryProductShow(Request $request)
    {   
        $products = SkuProduct::where('category_id', $request->category_id)->get();
        return view('crm_ticket.category_product', compact('products'));
    }
}
