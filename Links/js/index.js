const linksbutton = document.getElementById("linkbutton");
const linkcontainer = document.getElementById("linkcontainer");
const testlinks = document.getElementById("testlinks");
const allglinks = document.getElementById("allglinks");
const linkcontainerh = document.getElementById("linkcontainerh")

var bruh = false

linksbutton.addEventListener('click', function () {
    if (linksbutton.innerHTML == "Einklappen") {
        linksbutton.classList.add("hidden")
        linksbutton.innerHTML = "Ausklappen"
        slidemiddleleft(testlinks)
        slidemiddleright(allglinks)
        delay(1).then( () => linkcontainer.classList.add("slideup")).then( () => linkcontainerh.classList.add("slideup")).then( 
            () => delay(1).then( () => linkcontainer.classList.add("hidden")).then( () => linkcontainerh.classList.add("hidden")).then( 
            () => resettransform(testlinks)).then( () => linkcontainerh.classList.remove("slideup")).then( 
            () => linkcontainer.classList.remove("slideup")).then( () => resetslides(testlinks)).then( () => resetslides(allglinks)).then( () => linksbutton.classList.remove("hidden")))
        
    } else if (linksbutton.innerHTML == "Ausklappen") {
        linksbutton.innerHTML = "Einklappen"
        linkcontainer.classList.remove("hidden")
        linkcontainerh.classList.remove("hidden")
    }
})

function changebutton(button) {
    if (button.innerHTML == "Einklappen") {
        button.innerHTML = "Ausklappen"
    } else if (button.innerHTML == "Ausklappen") {
        button.innerHTML = "Einklappen"
    }
}

function slidemiddleleft(element) {
    element.classList.add("slideleft")
    delay(10).then( () => element.classList.remove("slideleft"))
}

function slidemiddleright(element) {
    element.classList.add("slideright")
    delay(10).then( () => element.classList.remove("slideright"))
}

function resetslides(element) {
    element.classList.remove("slideleft")
    element.classList.remove("slideright")
} 

function resettransform(element) {
    element.classList.add("notransform")
    delay(0.1).then( () => element.classList.remove("notransform"))
}

function delay(time) {
    time = time * 1000;
    return new Promise(resolve => setTimeout(resolve, time));
}