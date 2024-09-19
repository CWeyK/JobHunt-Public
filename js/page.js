let links=document.querySelectorAll('.page-numbers > a');
let bodyId=parseInt(document.body.id)-1;
links[bodyId].classList.add('active');