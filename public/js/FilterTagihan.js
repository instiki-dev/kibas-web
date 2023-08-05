const filter = document.querySelector("select");
const table = document.querySelector("#tableContent");

filter.addEventListener("change", function() {
    const xhr = new XMLHttpRequest()
    xhr.onload = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            table.innerHTML = xhr.responseText;
        }
    }
    xhr.open("GET", `/admin/rekening/tagihan/filter-tagihan?filter='${this.value}'`);
    xhr.send()
})
