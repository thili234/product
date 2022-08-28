<?php

namespace App\Http\Controllers;

use App\Models\Product;
use domain\Facades\ProductFacade;
use Illuminate\Http\Request;

class ProductController extends ParentController
{       
      
       

        public function index()
        {
            $response['tasks'] = ProductFacade::all();
           
            return view('pages.product.index')->with($response);
        }
        
        public function store(Request $request)
        {
            ProductFacade::store($request->all());

            return redirect()->back();
    
        }
        public function delete($task_id)
        {
            ProductFacade::delete($task_id);
            

            return redirect()->back();
        }

        public function status($task_id)
        {
            ProductFacade::status($task_id);

            return redirect()->back();
        }
    
}
