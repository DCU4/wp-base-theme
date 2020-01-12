window.onload = () => {
  let press = document.querySelectorAll('.press-post-content');
  press.forEach((p, i)=>{
    setTimeout(function(){
      p.classList.add('fade-in');
    }, (i*50)+100);
  });
}

const evt = window.document.createEvent('UIEvents');
evt.initUIEvent('scroll', true, false, window, 0);
window.dispatchEvent(evt);
