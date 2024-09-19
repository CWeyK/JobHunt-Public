let dropdown_items=document.querySelectorAll('.items');

            dropdown_items.forEach(items =>{
                items.onclick=()=>{
                    items_parent = items.parentElement.parentElement;
                    let output = items_parent.querySelector('.output');
                    output.value=items.innerText;
                }
            })