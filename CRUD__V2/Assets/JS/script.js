const deleteButtons = document.querySelectorAll('.delete');
deleteButtons.forEach(button =>{
    button.addEventListener('click',function(e){

        if(!confirm("are you sure to delete this")){
            e.preventDefault();
        }

    })
})