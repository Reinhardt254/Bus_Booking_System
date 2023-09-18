// variables
const form = document.querySelector('.cancel_form')
// var newdate = Date.now()
// form.querySelector('.email').value = newdate.toString().slice(0 ,10) 
const error_cancel = form.querySelector('.error_cancel')
form.addEventListener('submit',(e)=>{

    e.preventDefault()


error_cancel.classList.remove('active')
const email = form.querySelector('.email').value;
const ticket = form.querySelector('.ticket').value;
const phone = form.querySelector('.phone').value;
const reason = form.querySelector('.reason').value;

submitting();

})

function submitting(){
    const request = new XMLHttpRequest();
   const formData = new FormData(form);
       request.onload = ()=>{
           let data = request.responseText;
           if(request.readyState === 4 && request.status === 200 && data === 'success'){
             console.log(data)
        
            // success
            Swal.fire({
                icon: 'success',
                title: 'Ticket cancelled successifully',
                text: 'Please check your email for more information',
                confirmButtonText: 'OK'
           
              })
          
           }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid ticket number',
                confirmButtonText: 'OK'
              })
          

           }
      
       }
       request.open('POST','../php/cancel.php')
       request.send(formData);     
     
   }