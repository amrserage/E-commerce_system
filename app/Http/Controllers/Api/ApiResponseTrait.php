<?php
namespace App\Http\Controllers\Api;
trait ApiResponseTrait{
    public function ApiResponse($data=null,$message=null,$Status=null){
        $Array=[
            'data'=>$data,
            'message'=>$message,
            'status'=>$Status,
        ];
       
        return response($Array );
    }

}
