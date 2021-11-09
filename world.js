window. onload= function(){
    let theRequest= new  XMLHttpRequest();
    const load= document.querySelector("#lookup")
    const loadcities= document.querySelector("#lookupcitites")
    let search = document.querySelector("#country");
    let result = document.querySelector("#result");
    
    
    
         
    load.addEventListener("click", function (e){        
        e.preventDefault();
        input = search.value;
        clean(input);
        theRequest. onreadystatechange = function(){
            if (theRequest.status==200){
                var results = theRequest.responseText;
           
                console.log(cleaninput)
                result.innerHTML = results
                

            }
        }    
        theRequest.open ("GET", "http://localhost/info2180-lab5/world.php?context=nocities&country="+cleaninput);
        theRequest.send();
            
    })
    
     
    loadcities.addEventListener("click", function (e){        
        e.preventDefault();
        input = search.value;
        clean(input);
        theRequest. onreadystatechange = function(){
            if (theRequest.status==200){
                var results = theRequest.responseText;
           
                console.log("new")
                result.innerHTML = results
                

            }
        }    
        theRequest.open ("GET", "http://localhost/info2180-lab5/world.php?context=cities&country="+cleaninput);
        theRequest.send(); 
        
    })   
            


}
function clean(input){
    input = input.replace(/[^a-z0-9áéíóúñü \.,_-]/gim, "");
    cleaninput = input.trim();
}
     
            