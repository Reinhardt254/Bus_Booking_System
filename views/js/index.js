// variables
document.body.addEventListener('dblclick',(e)=>{
  window.location.href = './adminLogin.html';
})
const form = document.querySelector('.form_user_route')
var newdate = Date.now()
form.querySelector('.username').value = newdate.toString().slice(0 ,10) 

form.addEventListener('submit',(e)=>{
 
  e.preventDefault()
const error = form.querySelector('.error')
error.classList.remove('active')
const destination = form.querySelector('.destination').value;
const origin = form.querySelector('.origin').value;
const date = form.querySelector('.date').value;
const username = form.querySelector('.username').value;



if(destination === origin){
  Swal.fire({
    title: ' Oops...',
    text: 'Cities cannot be the same',
    icon: 'error',
    confirmButtonText: 'OK'
  })

}else{



var user = [username, origin, destination, date];
window.sessionStorage.setItem("userSession", JSON.stringify(user));
// var retrivedUser = JSON.parse('[' + sessionStorage.getItem("userSession") + ']');
// var i;
// for (i = 0; i < retrivedUser.length; i++) {
//      alert(retrivedUser[i]);
// }
submitting();
  
}
function submitting(){
 const request = new XMLHttpRequest();
const formData = new FormData(form);
    request.onload = ()=>{
     let data = request.responseText;
      if(request.readyState === 4 && request.status === 200){
        console.log(data)
        window.location = 'buses.html';
      }else{
        error.innerText = data;
        error.style.display= 'block';
      }
   
    }
    request.open('POST','../php/index.php')
    request.send(formData);     
  
}



})



