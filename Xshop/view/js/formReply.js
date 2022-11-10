let reply= document.querySelectorAll('.reply');
console.log(reply);
let formReply = document.querySelectorAll('.form_reply');
reply.forEach((item,index) =>{
    item.onclick = ()=>{
        for(let i = 0 ; i < formReply.length ; i++){
            formReply[i].classList.remove('action');
            formReply[index].classList.add('action');
        }
    }
})