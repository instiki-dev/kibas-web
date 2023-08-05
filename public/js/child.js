const title = document.querySelector("h2");
const pr5 = document.querySelectorAll(".pr-5")
const search = document.querySelector("#inputSearch")
const widget = document.querySelector(".widget")
const child = document.querySelector(".child")
const col = document.querySelectorAll(".wrapper")

if (window.innerWidth < 600) {
    title.classList.remove("ml-5");
    pr5.forEach(function(item) {
       item.classList.remove("pr-5")
    })
    search.classList.remove("w-25")
    widget.classList.remove("justify-content-end")
    child.classList.remove("px-5")
    child.querySelector(".pl-4").classList.remove("pl-4")
    col.forEach(function(item) {
        item.classList.remove("d-inline")
    })
}
