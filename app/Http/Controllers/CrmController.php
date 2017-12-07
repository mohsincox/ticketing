<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Crm;
use Excel;

class CrmController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$crms = Crm::with(['category', 'product'])->orderBy('id', 'desc')->get();
    	return view('crm.index', compact('crms'));
    }

    public function  downloadReportForm()
    {
    	return view('crm.report_download_form');
    }

    public function downloadReport(Request $request)
	{	//return $request->all();
		$startDate = $request->start_date.' 00:00:00';
		$endDate = $request->end_date.' 23:59:59';
        Excel::create('inbound'.$request->end_date, function($excel) use ($startDate,  $endDate) {

            $excel->sheet('Sheet1', function($sheet) use ($startDate,  $endDate) {

                $crms = Crm::with(['category', 'product'])->whereBetween('created_at', [$startDate, $endDate])->get();

                $arr =array();
                foreach($crms as $crm) {
                	if (isset($crm->category->name)) {
                		$categoryName = $crm->category->name;
                	} else {
                		$categoryName = null;
                	}
                	if (isset($crm->product->name)) {
                		$productName = $crm->product->name;
                	} else {
                		$productName = null;
                	}
                	if (isset($crm->product->name)) {
                		$productPrice = $crm->product->sku_price;
                	} else {
                		$productPrice = null;
                	}
                    $data =  array($crm->id, $crm->agent, $crm->created_at, $crm->phone_number, $crm->name, $crm->gender, $crm->type_of_caller, $crm->address, $crm->division, $categoryName, $productName, $productPrice, $crm->service_source, $crm->product_batch_code, $crm->verbatim, $crm->remarks);
                    array_push($arr, $data);
                }
                
                //set the titles
                $sheet->fromArray($arr,null,'A1',false,false)->prependRow(array(
                        'Id', 'Agent', 'Created At', 'Customer Phone Number', 'Customer Name', 'Gender', 'Type of Caller', 'Customer Address', 'Division', 'Category Name', 'Product Name', 'Product Price', 'Service Source', 'Product Batch Code', 'Verbatim', 'Remarks'
                    )

                );

            });

        })->export('xlsx');
    }
}
