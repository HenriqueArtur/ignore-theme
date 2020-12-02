function createGrid(size, partsQnt, divToAppend) {
    let partSize = (size/partsQnt).toFixed(1)
    let partSizeFloat = parseFloat(partSize)
    let divs = '<div id="group-vertical">'
    let left = partSizeFloat
    let top = partSizeFloat

    for(let i = partSizeFloat; i < size; i += partSizeFloat) {
        divs += `<div class="vertical-line" style="left: ${left.toFixed(1)}px; height: ${size}px;"></div>`
        left += partSizeFloat
    }
    divs += `</div>
            <div id="group-horizontal">`
    for(let i = partSizeFloat; i < size; i += partSizeFloat) {
        divs += `<div class="horizontal-line" style="top: ${top.toFixed(1)}px; width: ${size}px;"></div>`
        top += partSizeFloat
    }
    divs += `</div>`

    document.getElementById(divToAppend).innerHTML += divs
}

window.onload = () => {
    createGrid(300,8,'props-grid')
}

window.addEventListener("resize", function() {
    if(window.innerWidth <= 600) {
        let profile_img = document.getElementById('profile-img')
        profile_img.classList.toggle('center-align');
    } else {
        let profile_img = document.getElementById('profile-img')
        profile_img.classList.toggle('right-align');
    }
})