<?php

namespace domain\Services;

use App\Models\Product;

class ProductService
{
    protected $task;

    public function __construct()
     {
        $this->task = new Product();
     }

     public function all()
     {
         return $this->task->all();
        
     }
     
     public function store($data)
     {
         $this->task->create($data);

 
     }
     public function delete($task_id)
     {
         $task = $this->task->find($task_id);
         $task->delete();

     }

     public function status($task_id)
     {
         $task = $this->task->find($task_id);
         $task->status = 1;
         $task->update();

      
     }
 
    }