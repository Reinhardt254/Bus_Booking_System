function fetchData(){
const request = new XMLHttpRequest();


    request.onload = ()=>{
     let data = request.responseText;
      if(request.readyState === 4 && data !=''){
       console.log(data);
       document.querySelector('.bus-cards').innerHTML = data;
      }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No buses Scheduled for this route',
            confirmButtonText: 'OK'
          })
      }
   
    }

    request.open('POST','../php/buses.php')
    request.setRequestHeader('content-type','application/json')
    request.send(); 
}
fetchData();




