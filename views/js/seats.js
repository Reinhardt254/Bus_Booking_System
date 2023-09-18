
// submitting data
const stripe = document.querySelector('.stripe-btn')
const flutterwave = document.querySelector('.flutterwave-btn')

stripe.addEventListener('click',()=>{
 const url = '../payments/stripe.php';
 submitting(url)

})
flutterwave.addEventListener('click',()=>{
    const url = '../payments/processor.php'; 
    submitting(url)
})

const form = document.querySelector('.checkout_form')
form.addEventListener('submit',(e)=>{
    e.preventDefault()

})


function submitting(url){

const request = new XMLHttpRequest();
   const formData = new FormData(form);
       request.onload = ()=>{
        let data = request.responseText;
         if(request.readyState === 4 && request.status === 200 && data === 'success'){
           console.log(data)
           sessionStorage.removeItem("seat");
           window.location = url;
         }else{
            Swal.fire({
                title: ' Oops...',
                text: 'Please select a seat',
                icon: 'error',
                confirmButtonText: 'OK'
              })
         }
      
       }
       request.open('POST','../php/insertbookings.php')
       request.send(formData);     
     
   }




//   check for selected seat
const priceInp = document.querySelector('.priceInp').value;
const errorSeats = document.querySelector('.errorSeats')
const selectedPara = document.querySelector('.selectedPara')
const number = window.sessionStorage.getItem("seat");
selectedPara.innerHTML = number;

    if(number){
       const seat = document.getElementById(number) 
       seat.style = 'background:#7e5ad4'
       
       console.log(seat);
       document.querySelector('.sno').value = number; 
        document.querySelector('.priceSpan').innerHTML = priceInp;
    }else{
        selectedPara.innerHTML = ''; 
    }

const ClickedBtn = (btnSelected)=>{

const number = window.sessionStorage.getItem("seat");
if(number){

    addError();
    function addError(){
    errorSeats.innerHTML = 'Seat Already Selected,Double click to unselect';
    errorSeats.classList.add('active')    
    }
    function removeError(){
        errorSeats.classList.remove('active')   
    }
    setTimeout(removeError,4000)
 
   const seat = document.getElementById(number)
   console.log(seat);
 
}else{
const seatnumber = btnSelected.value;
window.sessionStorage.setItem("seat" ,seatnumber);
selectedPara.innerHTML = seatnumber;
document.querySelector('.sno').value = seatnumber; 

document.querySelector('.priceSpan').innerHTML = priceInp;
btnSelected.style = 'background:#7e5ad4'



}
}

const diselect = (btnDiselect)=>{


errorSeats.innerHTML = '';
errorSeats.classList.remove('active')

btnDiselect.style = 'background:7f5ad423'
const seat = btnDiselect;
console.log(seat)
document.querySelector('.priceSpan').innerHTML = 0;
sessionStorage.removeItem("seat");
selectedPara.innerHTML = '' ;
document.querySelector('.sno').value = ''; 



}

