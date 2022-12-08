
    const header = document.querySelector("header")
    window.addEventListener("scroll",function(){
        x = window.pageYOffset
        if(x>0){
            header.classList.add("sticky")
        }else{
            header.classList.remove("sticky")
        }
    })


    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
    const imgContainer = document.querySelector('.aspect-ratio-169')
    const dotItem = document.querySelectorAll(".dot")
    let imgNuber = imgPosition.length
    let index = 0
        // console.log(imgPosition)

    imgPosition.forEach(function(image,index){
        image.style.left = index*100 + "%"
        dotItem[index].addEventListener("click",function(){
            slider (index)
        })
    })
    function imgSlide (){
        index++;
        console.log(index)
        if (index>=imgNuber) {index=0}
         slider (index)

    }

    function slider (index){
        imgContainer.style.left = "-" +index*100+ "%"
        const dotActive = document.querySelector('.active')
        dotActive.classList.remove("active")
        dotItem[index].classList.add("active")
    }
    setInterval(imgSlide,3000)

     /*slidebar*/

     const itemsliderbar = document.querySelectorAll(".cartegory-left-li")
    itemsliderbar.forEach(function(menu,index){
        menu.addEventListener("click",function(){
        menu.classList.toggle("block")
        })
    })
      /*PRODUCT*/
    const baoquan = document.querySelector(".baoquan")
    const info = document.querySelector(".info")
    if(baoquan){
        baoquan.addEventListener("click",function(){
            document.querySelector(".product-content-right-bottom-content-info").style.display = "none"
            document.querySelector(".product-content-right-bottom-content-baoquan").style.display = "block"
        })
    }
    if(info){
        info.addEventListener("click",function(){
            document.querySelector(".product-content-right-bottom-content-info").style.display = "block"
            document.querySelector(".product-content-right-bottom-content-baoquan").style.display = "none"
        })
    }
    /*BUTTON DOW*/ 
    const button = document.querySelector(".product-content-right-bottom-top")
    if(button){
        button.addEventListener("click",function(){
            document.querySelector(".product-content-right-bottom-content-big").classList.toggle("activeB")
        })
    }
    /*doi img*/
    const bigImg = document.querySelector(".product-content-left-big-img img")
    const smallImg = document.querySelectorAll(".product-content-left-small-img img")
    smallImg.forEach(function(imgItem,x){
        imgItem.addEventListener("click",function(){
            bigImg.src = imgItem.src
        })
    }) 
