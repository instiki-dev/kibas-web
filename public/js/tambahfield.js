const btnTambah = document.querySelector("#btnTambah")
const form = document.querySelector("form .holder")
let i = 0

btnTambah.addEventListener("click", function() {
    i++
    let item = document.createElement("div")
    item.classList.add("form-row")
    item.classList.add("px-4")
    item.classList.add("mt-2")
    const detail = createDetail(i)
    const bobot = createBobot(i)
    const close = deleteField()

    close.addEventListener("click", function() {
        this.parentNode.parentNode.removeChild(this.parentNode)
        i--
    })

    item.appendChild(close)
    item.appendChild(detail)
    item.appendChild(bobot)
    form.appendChild(item)
    console.log(i)
})

function createDetail(i) {
    let input1 = document.createElement('input');
    input1.name = `detail${i}`
    input1.placeholder = "Detail Pertanyaan"
    input1.classList.add("form-control")
    input1.required = true

    let inputWrapper = document.createElement("div")
    inputWrapper.classList.add("col-md-6")
    inputWrapper.appendChild(input1)

    return inputWrapper
}

function createBobot(i) {
    let input1 = document.createElement('input');
    input1.name = `bobot${i}`
    input1.placeholder = "Bobot"
    input1.classList.add("form-control")
    input1.type = "number"
    input1.required = true

    let inputWrapper = document.createElement("div")
    inputWrapper.classList.add("col-md-2")
    inputWrapper.appendChild(input1)

    return inputWrapper
}

function deleteField() {
    let close = document.createElement('a');
    close.innerHTML = "<i class='fas fa-times-circle'></i>"
    close.classList.add("delField")
    close.classList.add("mr-1")
    close.classList.add("ml-2")
    close.classList.add("d-flex")
    close.classList.add("align-items-center")
    close.style.color = "#a64dff"

    return close
}
