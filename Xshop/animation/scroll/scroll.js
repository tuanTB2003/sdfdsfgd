const observe = new IntersectionObserver((entries)=>{
    entries.forEach(entry =>{
        if(entry.isIntersecting){
            entry.target.classList.add('show')
        }else{
            return;

        }
    })
})
const hiddenItems = document.querySelectorAll('.hidden')
hiddenItems.forEach(item=>{
    observe.observe(item)
})