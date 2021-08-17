(() => {
    window.addEventListener('DOMContentLoaded', (e) => {
    //=========================================================================
    //                     Zoom 
    //=========================================================================
    /* */
    //let zoomImg = document.querySelector('[data-js-zoom-img]');
    function imageZoomer(e) {
        e.preventDefault();
        let container = document.querySelector("[data-js-zoom]");
        let img = container.querySelector('[data-js-zoom-img]');
        
        
        
        container.addEventListener("mousemove", (e) => {
          let x = e.clientX - img.offsetLeft;
          let y = e.clientY - img.offsetTop - 270;
           img.style.transformOrigin = `${x}px ${y}px`;
          img.style.transform = "scale(1.7)";
         
    
          container.style.cursor = "zoom-in";
         
        });
        
        container.addEventListener("mouseleave", () => {
          img.style.transformOrigin = "center center";
          img.style.transform = "scale(1)";
        
        });
        }
        imageZoomer(e);
       
    
        //=========================================================================
        //                     Remplace les petites images 
        //=========================================================================
    
        function changeImg(e) {
          e.preventDefault();
          let mainImg = document.querySelector('[data-js-img]');
          let thumbsWrapper = document.querySelector('[data-js-thumbs]');
          let thumbs = thumbsWrapper.querySelectorAll('img');
          // This is going to return you an array with all the images you have in the document
    
          // here we're iterating that array
          for (let i = 0; i < thumbs.length; i++) {
            thumbs[i].style.cursor = "pointer";
    
            // thumbs[i].parentNode.classList.remove('active');
    
            // thumbs[i].parentNode.style.border  = "none";
    
            thumbs[i].addEventListener('click', (e) => { // au clic sur l'image il le .src url prendra la place de celui de l'image principale
    
              mainImg.src = thumbs[i].src;
    
              //   e.target.parentNode.style.border  = "2px solid #cac6b8";
    
    
    
            });
           
          }
    
    
        }
    
        changeImg(e);
    
    
        let elModal = document.querySelector('[data-js-modal]');
        let elOpenModal = document.querySelector('[data-js-modal-btn]');
        let elCloseModal = document.querySelector('[data-js-close-modal]');
        let img = document.querySelector('[data-js-img]');
        let imgModal = document.querySelector('[data-js-modal-img]');
        let offerModalBtn = document.querySelector('[data-js-offer-btn]');
        let elOfferModal = document.querySelector('[data-js-offer-modal]');
        let elCloseOfferModal = document.querySelector('[data-js-close-offer-modal]');
    
        // console.log(elModal);
        elOpenModal.addEventListener('click',  OpenModal);
        offerModalBtn.addEventListener('click',  OpenOfferModal);

        elCloseModal.addEventListener('click', CloseModal);
        elCloseOfferModal.addEventListener('click', CloseOfferModal);

         console.log(offerModalBtn);

        

        function CloseOfferModal(e) {
          e.preventDefault();
          if (elOfferModal.classList.contains('modal--open')) {
            elOfferModal.classList.replace('modal--open', 'modal--close');
    
            document.documentElement.classList.remove('overflow-y--hidden');
            document.body.classList.remove('overflow-y--hidden');
          }
    
    
        }





        function OpenOfferModal(e) {
          e.preventDefault();
          console.log('open');
          console.log(elOfferModal );
          
          if (elOfferModal.classList.contains('modal--close')) {
            elOfferModal.classList.replace('modal--close', 'modal--open')
    
            document.documentElement.classList.remove('overflow-y--hidden');
            document.body.classList.remove('overflow-y--hidden');
          }
    
    
        }
    
        
    function CloseModal(e) {
          e.preventDefault();
          if (elModal.classList.contains('modal--open')) {
            elModal.classList.replace('modal--open', 'modal--close');
    
            document.documentElement.classList.remove('overflow-y--hidden');
            document.body.classList.remove('overflow-y--hidden');
          }
    
    
        }
    
        function  OpenModal(e) {
          e.preventDefault();
    
          if (elModal.classList.contains('modal--close')) {
            elModal.classList.replace('modal--close', 'modal--open');
            document.documentElement.classList.add('overflow-y--hidden');
            document.body.classList.add('overflow-y--hidden');
          }
          // imgModal.src= img;
          imgModal.src = img.src;
          imgModal.alt = img.alt;
    
        }
    
  
    //=========================================================================
    //              Count-down Function ---- inspire de w3Schools
    //=========================================================================


    let ficheProd = document.querySelector('[data-js-fiche]');

let countDownDateEl = ficheProd.querySelector('[data-js-end-date]');
let startDateEl = ficheProd.querySelector('[data-js-start-date]');
let startDateFiche = startDateEl.textContent;
console.log(startDateEl.textContent);
   let countdownDateFiche =  new Date(countDownDateEl.textContent).getTime();
    let countStartDateFiche = new Date(startDateEl.textContent).getTime();
 
// Update the count down every 1 second
let x = setInterval(function() {

    // Get todays date and time
    // 1. JavaScript
    // let now = new Date().getTime();
    // 2. PHP
 

    let now = new Date().getTime();
   

    // Find the distance between now an the count down date
    let distance = countdownDateFiche - now;

    // Time calculations for days, hours, minutes and seconds
    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
      let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      let seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="demo"
    let timerFiche = document.querySelector('[data-js-fiche-countdown]');
    if (countStartDateFiche <= now ){

      
      timerFiche.innerHTML = days + "j " + hours + "h " + minutes + "m " + seconds + "s ";
      
       }else{
        timerFiche.innerHTML = 'Programmée pour '+ startDateFiche;
        countDownDateEl.parentElement.classList.add('hidden');
       }

    

    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.querySelector('[data-js-fiche-countdown]').innerHTML = " Enchère Expiré";
    }
}, 1000);
  
  

    });
})();