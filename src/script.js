window.onload = loader
let text = ""

function auto_grow(element) {
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
}


function resizeToMax(id) {
    myImage = new Image()
    var img = document.getElementById(id);
    myImage.src = img.src;
    if (myImage.width > myImage.height) {
        img.style.width = "90%";
    } else {
        img.style.height = "90%";
    }
}

function loader() {
    addDataToDropDown(document.getElementById("dropDown0"))
}

function addDataToDropDown(element, div = "") {

    fetch("../src/data copy.json", { method: 'POST' })
        .then(response => response.json())
        .then(json => {

            try { 
                if (div != "") { // false if function called via loader()
                    for (let child of div.children) {
                        if (typeof (json[child.value]) != "string") {
                            json = json[child.value]
                            text = JSON.stringify(json)
                        }
                        else {
                            text = json[child.value]
                            throw new Error("MaxLimitJson") // Deepest in json
                        }
                    }
                    div.appendChild(element)
                }

                var diss = document.createElement('option') // creates disabled option
                diss.disabled = true
                diss.selected = true
                diss.innerHTML = "Välj undermeny"
                element.appendChild(diss)

                for (const key of Object.keys(json)) { // creates options from json
                    var child = document.createElement('option')
                    child.innerHTML = key
                    element.appendChild(child)
                }
            }
            catch (err) {
                if (err.message == "MaxLimitJson") {
                    doTextarea()
                }
                console.log(err.message)
            }


        })
}

function newDropDown(element) {
    var dropDown = document.createElement('select')
    var div = document.getElementById("dropDowns")
    var amount = div.children.length

    dropDown.classList.add("dropdown_adm")
    dropDown.id = "dropDown" + amount
    dropDown.onchange = function () { newDropDown(this) }

    // console.log(element.id)
    // console.log(element)
    // console.log(element.id.charAt(8))
    // console.log(div.children.length)
    if (parseInt(element.id.charAt(8)) == div.children.length - 1) {
        addDataToDropDown(dropDown, div)
    }
    else {
        console.log("GUEBGEIOSNGFIOUJESNBGKOESNGSEIONG")
        //div.children = div.children.splice(element.id.charAt(8), div.children.length - 1 - element.id.charAt(8))
        div.removeChild(div.lastElementChild)
        document.getElementById("textarea").innerHTML = ""
        newDropDown(element)
    }
}

function doTextarea() {
    var texten = document.createElement('textarea')
    texten.innerHTML = text
    texten.oninput = function () { auto_grow(this) }
    document.getElementById("textarea").innerHTML = ""
    document.getElementById("textarea").appendChild(texten)
    auto_grow(texten)
    document.getElementById("submitDiv").style.display = "block"
}

function editCurrent() {
    console.log(text)
    doTextarea()
}

function saveEdit() {

    var newJson = JSON.parse(document.getElementById("textarea").children[0].innerHTML) 
    console.log(newJson)

    fetch("../src/data copy.json", { method: 'POST' })
        .then(response => response.json())
        .then(json => {

            for (let child of document.getElementById("dropDowns").children) {
                if (typeof (json[child.value]) != "string") {
                    json = json[child.value]
                    text = JSON.stringify(json)
                }
                else {
                    text = json[child.value]
                }
            }
        }


        document.getElementById("submitDiv").style.display = "none"
}