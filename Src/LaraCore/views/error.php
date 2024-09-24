<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opps</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src=".\corejsfiles\error.js"></script>
</head>
<body class="bg-gray-200">
     <h1 class="text-red-500 text-[2.5rem] font-semibold"> OPPS an error occured!!</h1>
    <div class="flex flex-col justify-center items-center ">
       
       
    <div class="bg-gray-100 w-[90%] h-[200px] rounded-md flex  justify-content  flex-col gap-1 p-3">
        <a href="<?=$_SERVER["REQUEST_URI"]?>"> https//:localhost:8080<?=$_SERVER["REQUEST_URI"]?></a>
             <span class="text-[1.5rem] text-gray-400 "><?= get_class($error)?></span>
            <span class="text-[1.5rem] "><?=$error->getMessage()?></span> 
        </div>
    </div> <div class="py-4 px-4 w-full flex bg-gray-800 gap-28 text-white text-[1.2rem]">
            <span class="p-1 bg-gray-600 cursor-pointer">Stack Trace</span>
            <span class=" p-1 hover:bg-gray-600 cursor-pointer">Stack Trace</span>
            <span class="p-1 hover:bg-gray-600 cursor-pointer">Stack Trace</span>
            <span class="p-1 hover:bg-gray-600 cursor-pointer">Stack Trace</span>
            <span class="p-1 hover:bg-gray-600 cursor-pointer">Stack Trace</span>
            <span class="p-1 hover:bg-gray-600 cursor-pointer">Stack Trace</span>
        </div>
        <span class="text-gray-400 text-[1.2rem]"> File:<?php echo $error->getFile() ?></span>
    <div class="flex gap-2">
       <div class="border border-gray-400 p-3  w-fit">
       <?php $traces=$error->getTrace() ?> 

        <?php
        $errorFiles=[];
        function ShowCode($file,$line,$context=5){
            $lines = file($file);
            return $lines;
            //  for ($i = $start; $i < $end  ; $i++) { 

            // //    if($i + 1  !== $line){
            // //       echo "<span class='' >".$lines[$i]."<span/>";
            // //    }else{
            // //   echo  "<span class='bg-red-300'>".$lines[$i]."<span/>";
            // //    }
                
     
            //  }
         }
        ?>
        <?php foreach($traces as $index => $trace){
             $errorFiles[$index]=ShowCode($trace['file'],$trace["line"]);
             
            ?>
            <div class="w-[300px] border border-gray-400 h-32 mb-1 rounded-sm p-1 bg-gray-300 cursor-pointer" onclick='errorDisplayer( line=<?php echo $trace["line"]  ?>, file=<?php echo json_encode($errorFiles[$index])?>)'>
                <p class="text-wrap break-words text-[0.8rem] mt-4 font-semibold cursor-pointer"><?=$trace['file']?></p>
        </div>
            <?php

        } 

        
        
        
        echo "<pre>";
        // dd($errorFiles);
        
      echo   "</pre>";
        ?>
       </div>
       
       <div class="bg-neutral-200 w-full" id="error_details">
    
        
       </div> 

        <div>
    
        </div>
      
       <div class="w-500px h-100px bg-slate-400"></div>
    </div>
    <pre>
     <!-- <?php dd( $error)?>    -->
    </pre>
  
  
</body>
</html>
