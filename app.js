const inputData = document.querySelector('.inputData');
const btn = document.querySelector('.submit');
// const done = document.querySelectorAll('.blank');

inputData.addEventListener('keypress',(event)=>{
  
  if (event.which === 13) {
    
    event.preventDefault();
    // event.stopPropagation();
    btn.click();
    
  }
})

// done.forEach(element => {
//   element.addEventListener('click', (e) => {
//     e.preventDefault();
//     const checked = element.querySelector('img');
//     const parent = element.parentNode;
//     const text = parent.querySelector('.list_item');
//     console.log(e.currentTarget);
//     checked.classList.toggle('show');
//     text.classList.toggle('stroke');
//     // element.style.display = 'none';
//   })
// })