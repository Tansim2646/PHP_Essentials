document.addEventListener('DOMContentLoaded',function(){
    const link = document.querySelectorAll('.link');
    for(var i =0;i<link.length;i++){
        link[i].addEventListener('click',function(e){
            if(!confirm("Are you sure?")){
                e.preventDefault();
                
            }
        })
    }
    
})