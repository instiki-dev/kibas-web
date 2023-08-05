const input = document.querySelector("#inputSearch");
const table = document.querySelector("#tableContent");

input.addEventListener("input", function() {
    const xhr = new XMLHttpRequest()
    xhr.onload = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            table.innerHTML = xhr.responseText;
        }
    }
    xhr.open("GET", `/admin/kelurahan/cari-kelurahan?kelurahan='${this.value}'`);
    xhr.send()
})
