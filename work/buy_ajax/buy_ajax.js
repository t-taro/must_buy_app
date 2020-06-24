'use strict';

const buyBtn = document.getElementById('buy_btn');
const items = document.querySelectorAll('.item_row');

let deleteItemId = [];
let postData;

buyBtn.addEventListener('click', ()=>{
  
  deleteItemId = [];
  postData = new FormData();
  
  items.forEach(item => {
    const checkbox = item.firstElementChild;
    
    if (checkbox.checked){
      deleteItemId.push(item.dataset.itemId);
      postData.append('deleteItems[]', item.dataset.itemId);
    };
  });
  
  const xhr = new XMLHttpRequest();
  
  // post後の処理
  // dbが更新された後にUIが変わる
  xhr.addEventListener("load",function(e){
    if (this.readyState === 4) {
      if (this.status === 200){
        
        // console.log(postData.getAll('deleteItems'));
        //このブロックの中にpostが完了した後の処理を書く
        items.forEach(item => {
          deleteItemId.forEach(id => {
            if (item.dataset.itemId == id){
              item.remove();
            };
          });
        });
      };
    };
  });
  
  xhr.open('POST', '../buy_ajax/buy_ajax.php'); //postを投げる先のパスを指定
  xhr.send(postData);
  
});
