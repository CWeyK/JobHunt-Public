let dropdown_items=document.querySelectorAll('.job-filter form .dropdown-container .dropdown .lists .items');

            dropdown_items.forEach(items =>{
                items.onclick=()=>{
                    items_parent = items.parentElement.parentElement;
                    let output = items_parent.querySelector('.output');
                    output.value=items.innerText;
                }
            })