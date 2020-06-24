'use strict';

// ページのタイトルによってヘッダー内にアカウントアイコンを表示
const pageTitle = document.title;
const header = document.querySelector('header');

if (pageTitle !== 'Login' && pageTitle !== 'Signin' && pageTitle !== 'profile'){
  const idIcon = document.createElement('i');
  const a = document.createElement('a');
  
  a.setAttribute('href', '../profile/mypage.php')
  
  a.appendChild(idIcon);
  idIcon.classList.add('fas', 'fa-id-card');
  
  header.appendChild(a);
}else if(pageTitle === 'profile'){
  console.log(pageTitle);
  
  const p = document.createElement('p');
  const a = document.createElement('a');
  a.setAttribute('href', '../logout.php');
  a.textContent = 'Logout';
  p.appendChild(a);
  p.classList.add('logout');
  
  header.appendChild(p);
};


