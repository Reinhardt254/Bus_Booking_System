// variables
const form = document.querySelector('.addBus')

let error = form.querySelector('.addbus_error')
form.addEventListener('submit',(e)=>{

    e.preventDefault()



const destination = form.querySelector('.destination').value;
const origin = form.querySelector('.origin').value;
const time = form.querySelector('.time').value;
const bus_name = form.querySelector('.bus_name').value;
const capacity = form.querySelector('.capacity').value;
if(destination === origin){
 
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Cities cannot be the same',
    confirmButtonText: 'OK'
  })

}else{


  Swal.fire({
    icon: 'success',
    title: 'Done',
    text: `${bus_name} added successifully`,
    confirmButtonText: 'OK'
  })
}



})

function submitting(){
    const request = new XMLHttpRequest();
   const formData = new FormData(form);
       request.onload = ()=>{
        let data = request.responseText;
         if(request.readyState === 4 && request.status === 200 && data === 'success'){
          Swal.fire({
            icon: 'success',
            title: 'Done',
            text: `${bus_name} added successifully`,
            confirmButtonText: 'OK'
          })
         }else{
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong',
            confirmButtonText: 'OK'
          })
         }
      
       }
       request.open('POST','../php/adminAddBus.php')
       request.send(formData);     
     
   }

