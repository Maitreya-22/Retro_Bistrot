const modalClose=()=>{
    const closeBtn=document.querySelector(".err-close");
    const modal=document.querySelector(".modal-bg");
    if(closeBtn !== null){
    closeBtn.addEventListener("click", ()=>{
      console.log("clicked");
      modal.style.display="none";
    });
    window.addEventListener("click", (e)=>{
      if(e.target===modal){
        modal.style.display="none";
      }

    });
    }
    }

    modalClose();


const placeOrder= document.querySelector(".order");

const modal= document.querySelector(".modal-bg");


placeOrder.addEventListener('click',()=>{
    modal.classList.remove('show-modal');
})
