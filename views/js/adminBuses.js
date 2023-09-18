function fetchData(){
    const request = new XMLHttpRequest();
    
    
        request.onload = ()=>{
         let data = request.responseText;
          if(request.readyState === 4 ){
          
           document.querySelector('.bus-cards').innerHTML = data;
          }else{
              console.log('error')
          }
       
        }
    
        request.open('POST','../php/adminBuses.php')
        request.setRequestHeader('content-type','application/json')
        request.send(); 
    }
    fetchData();


function sendData(){
    const request = new XMLHttpRequest();
    
    
        request.onload = ()=>{
         let data = request.responseText;
          if(request.readyState === 4 && request.status ===200 ){
            Swal.fire({
                icon: 'success',
                title: 'Done',
                text: `${'Reminders send'}`,
                confirmButtonText: 'OK'
              })
          }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: `${'Something Went wrong'}`,
                confirmButtonText: 'OK'
              })
          }
       
        }
    
        request.open('POST','../php/reminder.php')
        request.setRequestHeader('content-type','application/json')
        request.send(); 
    }

   
    document.querySelector('.reminder').addEventListener('click',()=>{

      sendData();  

    })
