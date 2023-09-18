// variables
const form = document.querySelector('.adminRegister')
// var newdate = Date.now()
// form.querySelector('.email').value = newdate.toString().slice(0 ,10) 

form.addEventListener('submit',(e)=>{

    e.preventDefault()

const error = form.querySelector('.error')
error.classList.remove('active')
const email = form.querySelector('.email').value;
const password = form.querySelector('.password').value;

if(password.length < 6){
  //  error.classList.add('active')
  
   error.style.display= 'block';
   
   error.innerText = 'Minimum password characters is 6';
}else{



var admin = [email];
window.sessionStorage.setItem("admin", JSON.stringify(admin));

submitting();
  
}
function submitting(){
 const request = new XMLHttpRequest();
const formData = new FormData(form);
    request.onload = ()=>{
        let data = request.responseText;
        if(request.readyState === 4 && request.status === 200 && data === 'success'){
          console.log(data)
           window.location = 'adminLogin.html';
        }else{
          error.innerText = data;
          error.style.display= 'block';
        }
   
    }
    request.open('POST','../php/adminRegister.php')
    request.send(formData);     
  
}



})