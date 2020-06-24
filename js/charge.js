//[Done] Set your publishable key: remember to change this to your live publishable key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
var stripe = Stripe(API_PUBLISHING_KEY);  //this variable is definded in "vars.js" file and we invoke it before this file[the reason of this to hide the key form github repo]
var elements = stripe.elements();


// Custom styling can be passed to options when creating an Element.
var style = {
    base: {
      // Add your base input styles here. For example:
      
      fontSize: '16px',
      color: '#32325d',
      fontFamily: 'Arial, Helvetica, sans-serif',
      fontSmoothing: 'antialiasd',
      '::placeholder':{color:'#aab7c4'}
    },
    invalid:{
        color:'#fa755a',
        iconColor:'#fa755a'
    }
  };
  

// Create an instance of the card Element.
var card = elements.create('card', {style: style});
  
// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');


// Handle real-time validation errors from the card Element.
card.addEventListener('change' , function(event){
    var displayError = document.getElementById('card-errors');
    if(event.error){
        displayError.textContent = event.error.message;
    }else{
    displayError.textContent = '';
    }
});


// Create a token or display an error when the form is submitted.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the customer that there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});




/****************************** Start Functions ***************************/

//function to give the token to the server
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
  
    // Submit the form
    form.submit();
 }

 //function to continuously change the color of 'helping w.w....'
 function WWColor(){
  
  setInterval(() => {
     let hexa = ['1','2','3','4','5','6','7','8','9','a','b','c','d','e','f'];
     let Gcolor ="#";
     for(let i=0;i<6;i++){
        Gcolor += hexa[Math.floor(Math.random()*17)]+"";
     }
     console.log(Gcolor);
     document.getElementById("ww").style.color = Gcolor;
   }, 300);
 
  }
/****************************** End Functions ***************************/  






