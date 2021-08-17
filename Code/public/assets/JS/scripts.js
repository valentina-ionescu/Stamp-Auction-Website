

(() => {
  window.addEventListener('DOMContentLoaded', (e) => {

   
//=========================================================================
//                      Filters - price min max - slider
//=========================================================================

    //  console.log('JS fonctionne!!!');
    function rangeSlider(e) {
      e.preventDefault();

      let slider = document.querySelectorAll('[data-js-slider]');
      let range = document.querySelectorAll(".range-slider__range");
      let value = document.querySelectorAll(".range-slider__value");
      //console.log(value);

      slider.forEach((currentSlider) => {

        value.forEach((currentValue) => {
          let val = currentValue.previousElementSibling.getAttribute("value");
          currentValue.innerText = val;
          // console.log(currentValue);


        });

        range.forEach((elem) => {
          elem.addEventListener("input", (eventArgs) => {
            elem.nextElementSibling.innerText = eventArgs.target.value;
          });
        });
      });
    }
    rangeSlider(e);




    


    //=========================================================================
    //                     List-Grid View function
    //=========================================================================
    // cherche les boutons 
    let btnList = document.querySelector('[data-js-list-btn]');
    let btnGrid = document.querySelector('[data-js-grid-btn]');
    console.log(btnList);

    // les elements de la grille a transformer

    let Cards = document.querySelectorAll("[data-js-list]");



function init(e){
  e.preventDefault();
  btnList.addEventListener('click', listView);
  btnGrid.addEventListener('click', gridView);

}




    //  btnList.addEventListener('click', listView);
    //  btnGrid.addEventListener('click', gridView);

    init(e);

    function listView(e) {
      e.preventDefault();
      console.log("list");
      if (btnGrid.classList.contains('active')) {
        btnGrid.classList.remove('active');
        btnList.classList.add('active');
      }

      for (let i = 0; i < Cards.length; i++) {
        // console.log(Cards[i]);

        Cards[i].classList.add('list');

      }


    }


    function gridView(e) {
      e.preventDefault();


      if (btnList.classList.contains('active')) {
        btnList.classList.remove('active');
        btnGrid.classList.add('active');
      }

      for (let i = 0; i < Cards.length; i++) {

        if (Cards[i].classList.contains('list')) {
          Cards[i].classList.remove('list');
        }

      }
      // console.log("hello! Grid");


    }



    //=========================================================================
    //              Count-down Function ---- inspire de w3Schools
    //=========================================================================
    let gridCards = document.querySelectorAll('[data-js-card]');
    

   
  console.log(gridCards);
  // let countDownDate;
    // Set the date we're counting down to
    for (let i = 0; i < gridCards.length; i++) {
      // console.log(gridCards[i]);

   let endDate  = gridCards[i].querySelector('[data-js-end-date]');
   let startDate = gridCards[i].querySelector('[data-js-start-date]');
   console.log(endDate.parentElement);

  let countDownDate = new Date(endDate.textContent).getTime(),
      countStartDate = new Date(startDate.textContent).getTime();

      console.log(countStartDate);
    // Update the count down every 1 second
    let x = setInterval(function () {

      // Get today's date and tim
      let now = new Date().getTime();

      // Find the distance between now and the count down date
      let distance = countDownDate - now;
      
     

      // Time calculations for days, hours, minutes and seconds
      let days = Math.floor(distance / (1000 * 60 * 60 * 24));
      let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      let seconds = Math.floor((distance % (1000 * 60)) / 1000);
 
      // Display the result in the element with id="demo"
      let timer = gridCards[i].querySelector('[data-js-countdown]');
      if (countStartDate <= now ){

      
      timer.innerHTML = days + "j " + hours + "h " + minutes + "m " + seconds + "s ";
      timer.parentNode.classList.add('red_txt');
       }else{

        endDate.parentNode.classList.add('hidden');
       }

      if (distance < 0) {
      clearInterval(x);
      timer.innerHTML = "Expiré";
      // endDate.parentNode.innerHTML = '';
      // startDate.parentNode.innerHTML = '';


      timer.parentNode.classList.add('red_bkg', 'white_txt');
      timer.classList.add('white_txt');


    }


      // If the count down is finished, write some text
     
    }, 1000);


   



}



// Set the date we're counting down to
// 1. JavaScript
// let countDownDate = new Date("Sep 5, 2018 15:37:25").getTime();
// 2. PHP



  });
})();