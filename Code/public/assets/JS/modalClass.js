window.addEventListener('DOMContentLoaded', () => {
  class Modal {
    constructor(overlay) {
      this.overlay = overlay;
      
      console.log(this.overlay);
      // Variable closeButton DOM => id .button-close 
      const closeButton = overlay.querySelector('.button-close')
      
      // Eventlistener pour click
      closeButton.addEventListener('click', this.close.bind(this));
      // Methode
      //overlay.addEventListener('click', e => {
       //if (e.srcElement.id === this.overlay.id) {
          //this.close();
        //}
      //});
    }
    // Remove class from css Hidden to show
    open() {
      this.overlay.classList.remove('modal--close');
    }
    // Add class to css to hide 
    close() {
      this.overlay.classList.add('modal--close');
    }
  }
  //Image modal
  const modal = new Modal(document.querySelector('.modal-overlay'));
  window.openModal = modal.open.bind(modal);
  //window.openModal();

});