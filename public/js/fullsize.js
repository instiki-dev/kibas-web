const bukti = document.querySelector("#bukti")

bukti.addEventListener("click", function() {
    let url = bukti.getAttribute('src')
    window.open(url)
})
