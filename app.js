const inputData = document.querySelector('.inputData');
const btn = document.querySelector('.submit');


inputData.addEventListener('keypress',(event)=>{
  
  if (event.which === 13) {
    
    event.preventDefault();
    // event.stopPropagation();
    btn.click();
    
  }
})



// const actionbtn = document.querySelectorAll('.actionbtn');
const actionbtn = document.getElementsByClassName('actionbtn');

console.log(actionbtn);
actionbtn.forEach(element => {
  element.addEventListener('click',()=>{
    console.log(element);
    element.classList.toggle('filter');
  })
})

const js = document.querySelector('js');

js.innerHTML=actionbtn;

const btnClick = (e) => {
  e.target.classList.toggle('filter');
}