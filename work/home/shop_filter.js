'use strict';

// const shopFilter = document.getElementById('shop_filter_select');

// shopFilter.addEventListener('change', (e)=>{
  
//   postData = new FormData();
//   postData.append('shop', e.target.value);
  
//   const xhr = new XMLHttpRequest();
  
//   // post後の処理
//   // dbが更新された後にUIが変わる
//   xhr.addEventListener("load",function(e){
//     if (this.readyState === 4) {
//       if (this.status === 200){
//         // console.log(postData.getAll('deleteItems'));
//         //このブロックの中にpostが完了した後の処理を書く      
//         let shopTags = document.querySelectorAll('.shop_tag');
        
//       };
//     };
//   });
  
//   xhr.open('GET', '../shop_filter_ajax/shop_filter.php'); //postを投げる先のパスを指定  
//   xhr.send(postData);

// });

const shopFilter = document.getElementById('shop_filter_select');

shopFilter.addEventListener('change', (e)=>{
  const itemRows = document.querySelectorAll('.item_row');
  
  for (let i = 0; i < itemRows.length; i++){
    const itemRow = itemRows[i];
    const tags = itemRows[i].children[1].children[2].children;
    
    if (e.target.value === 'default'){
      itemRow.classList.remove('hidden');
    } else {
      for (let i = 0; i < tags.length; i++){
        const tag = tags[i];
        
        if (e.target.value === tag.textContent){
          itemRow.classList.remove('hidden');
          break;
        }else{
          itemRow.classList.add('hidden');
        };
      };
    };
  };
});