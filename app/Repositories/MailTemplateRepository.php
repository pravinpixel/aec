<?php

namespace App\Repositories;


use App\Interfaces\MailTemplateRepositoryInterface;
use App\Models\Admin\MailTemplate;
use App\Models\Enquiry;
use App\Models\Customer;
use App\Models\Documentary\Documentary;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;



class MailTemplateRepository implements MailTemplateRepositoryInterface{
    
    protected $model;
    protected $documentary;

    public function __construct(MailTemplate $mailTemplate,Documentary $documentary)
    {
        $this->model = $mailTemplate;
        $this->documentary = $documentary;
        
    }
    public function all()
    {
        return $this->model->all();
    }
    public function create(array $data)
    {
    
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }
    public function delete($id)
    {
        $documentary = $this->model->find($id);
         $documentary->is_active=2;
         $documentary->save();
         return $documentary->delete();
    }

    public function status($id)
    {
        // return $this->model->find($id);
        // $module->is_active = !$module->is_active;
        if (null ==  $documentary = $this->model->find($id)) {
            throw new ModelNotFoundException("Status Not Updated");
        }
        $documentary->is_active =  !$documentary->is_active;
        $documentary->save();
        return  $documentary;
        
    }
    public function updateStatus($id)
    {

        if (null ==  $documentary = $this->model->find($id)) {
            throw new ModelNotFoundException("Status Not Updated");
        }
        $documentary->is_active =  !$documentary->is_active;
        $documentary->save();
        return  $documentary;
        
    }

    public function find($id)
    {
        if (null == $documentary = $this->model->find($id)) {
            throw new ModelNotFoundException("Building Component not found");
        }
        return $documentary;
    }

    public function get($request)
    {
        return $this->model->where('is_active',1)->get();
    }
    
    public function getDocumentaryData($request)
    {
        return $this->documentary->where('is_active',1)->get();
    }
    public function getDocumentaryOneData($request)
    {
        // $pdf = PDF::loadView('admin.enquiry.enquiryPDF.enquiryPdf');
      // download PDF file with download method
    //   return $pdf->download('pdf_file.pdf');
        // return $request->all();
        $enquiry = Enquiry::where('id',$request->enquireId)->first()->toArray();
        $document = Documentary::where('id',$request->documentId)->first();
        $customer =  Customer::where('id',$enquiry['customer_id'])->first()->toArray();

        $datas = array_merge($enquiry,$customer);      
           
        // return gettype($customer);

        $documentData =[];
        $changeData =[];
        $changeData = $datas;
        $documentData = $document['documentary_content'];
// $arr = [];
// $arr =  (array)$enquiryData;
//  return ($enquiryData);
    $documentData;
    $keyData       = array_keys($changeData);
    $valueData    = array_values($changeData);
    $new_string = str_ireplace($keyData, $valueData, $documentData);

    //removing {}
    $search = array('{','}');
    $newDocumentData = str_replace($search,"",$new_string);
  
    $document['documentary_content'] = $newDocumentData;
// return $newDocumentData;
$data = array(
    'enquiry'=>$enquiry,'document'=>$document,'customer'=>$customer
);

return ($data);
   
    

//  $string="hi man, how are you? man is here. hi again.";
// $list = Array
// (
//    "hi" => 0,
//    "man" => 1,
// );
// // return array_values($list);

// $find       = array_keys($list);
// $replace    = array_values($list);
// $new_string = str_ireplace($find, $replace, $string);

// return $new_string;

   
    }
    
    
}