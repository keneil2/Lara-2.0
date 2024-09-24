<?php
 namespace Lara\LaraCore\Services;

 class LaraExceptions{
    public function getAppMode(){
     return env("APP_MODE");
    }


    public function ExceptionHandler(\Exception $exception){
    //     $message=$exception->getMessage();
    //     $file=$exception->getFile();
    //    $line= $exception->getLine();
    //     $stack= $exception->getTraceAsString();
    //     $code =$exception->getCode();
    //     $errors=[
    //     $message,
    //     $file,
    //     $line,
    //     $stack,
    //     $code
    // ];
    $errors=$exception;
    if(str_replace(['"',"'"],'',env("APP_MODE"))=="DEV"){
      $this->renderError($errors);
    }
        
    }

    public function ErrorHandler(){

    }

    public function renderError($error){
     
      compact("error");
     require __DIR__."\\..\\views\\error.php";
    }


 }