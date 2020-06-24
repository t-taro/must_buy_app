'use strict';

const tags = document.querySelectorAll('.shop_tag');

console.log(tags);

tags.forEach(e => {
  switch (e.textContent){
    case 'supermarket':
      e.style.backgroundColor = '#ffcad3';
      break;
    case 'drugstore':
      e.style.backgroundColor = '#82c1f7';
      break;
    case 'other':
      e.style.backgroundColor = '#95ff99';
      break;  
  }; 
});