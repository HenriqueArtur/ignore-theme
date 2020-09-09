function createGrid(size, partsQnt, color, divToAppend) {
    let partSize = (size/partsQnt).toFixed(1)
    let partSizeFloat = parseFloat(partSize)
    let divs = ''
    let left = partSizeFloat

    for(let i = partSizeFloat; i < size; i += partSizeFloat) {
        divs += `<div class="vertical-line" style="left: ${left.toFixed(1)}vw; height: ${size}vh"></div>`
        left += partSizeFloat
    }

    console.log(divs)
    document.getElementById(divToAppend).innerHTML += divs
}

createGrid(40,10,0,'group-vertical')