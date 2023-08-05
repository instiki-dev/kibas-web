const bar = document.querySelector(".bar");
const btnMenu = document.querySelector("#btnMenu");
const menu = document.querySelector("#menuOption");
const btnClose = document.querySelector("#btnClose");

if (window.innerWidth < 600) {
    document.body.classList.remove("justify-content-end");
    bar.classList.remove("align-items-center");
    bar.classList.remove("justify-content-start");
    bar.classList.remove("h-100");
    bar.classList.remove("ml-2");
    bar.classList.remove("mr-3");
    menu.classList.remove("mt-3")
    menu.classList.remove("w-100")
    menu.classList.add("px-3")
    menu.classList.add("pt-2")
}

btnMenu.addEventListener("click", function() {
    menu.classList.remove("hide");
    menu.classList.add("active");
})

btnClose.addEventListener("click", function() {
    menu.classList.remove("active");
    menu.classList.add("deactive");
    setTimeout(function() {
        menu.classList.remove("deactive");
        menu.classList.add("hide");
    }, 500)
})
