// variables
const form = document.querySelector('.addRoute')

let error = form.querySelector('.addroute_error')
form.addEventListener('submit',(e)=>{

    e.preventDefault()

// error.classList.remove('active')

const city = form.querySelector('.city').value;
const cityCode = form.querySelector('.cityCode').value;

  submitting();

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
            text: `${data}`,
            confirmButtonText: 'OK'
          })
         }else{
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `${data}`,
            confirmButtonText: 'OK'
          })
         }
      
       }
       request.open('POST','../php/adminAddRoute.php')
       request.send(formData);     
     
   }

