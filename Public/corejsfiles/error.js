function errorDisplayer(line,file){
   container=document.getElementById("error_details");
   context=5;
 let  start= Math.max(line - context - 1, 0);
  let end=Math.min(line + context - 1, file.length);
  let output="";
 for (let index = start ; index < end; index++) {
   
      if (index + 1 !== line) {
         output += "<div class='mb-[10px] hover:bg-red-400'><span class='mr-[100px]  '>" + (index + 1) + "</span><span>" + file[index] + "</span></div>";
     } else {
         output += "<div class='mb-[10px] hover:bg-red-400'><span class='mr-[100px]'>" + (index + 1) + "</span><span class='text-red-600'>" + file[index] + "</span></div>";
     }
     
   
 }
container.innerHTML=output;

}