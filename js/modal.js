var listCWEs = [];

function toggleModal(element) 
{
    if(document.querySelectorAll(".alert").length > 0 || document.querySelectorAll(".alert-primary") > 0) removeElementsByClass(".alert-primary");
    const body = document.body;
    const modalContainer = document.querySelector("#modal-container-"+element);
    const cardContainer = document.querySelector("#card-container-"+element);
    const modalWindow = document.querySelector("#modal-window-"+element);
    
    // Add or remove 'open-modal' class to body to activate styles
    body.classList.toggle('open-modal');

    // Check if the container modal is hidden or not
    if(modalContainer.style.visibility == 'hidden' && modalContainer.style.opacity == '0' 
        || 
        modalContainer.style.visibility == '' && modalContainer.style.opacity == '')
    {
        showModal(modalContainer, modalWindow, 'visible', '1', 'block');
    }else
    {
        showModal(modalContainer, modalWindow, 'hidden', '0', 'none');
    }
    animationModal(cardContainer, modalWindow, 'card-container-in 1s both', 'modal-window-in 1s both');
}

function showModal(contianer, window, visibility, opacity, display)
{
    contianer.style.visibility = visibility;
    contianer.style.opacity = opacity;
    window.style.display = display;
}

function animationModal(container, window, animationContainer, animationWindow)
{
    container.style.animation = animationContainer;
    window.style.animation = animationWindow;
}

function getListCWEs(element)
{
    if(document.querySelectorAll(".alert").length > 0 || document.querySelectorAll(".alert-primary") > 0) removeElementsByClass(".alert-primary");
    let parentNode = getParentNode(element);
    let lis = parentNode.querySelectorAll("ul li");
    pushElementsList(lis);
    const formData = new FormData();
    formData.append("chooseRandom", "ok");
    formData.append("listCWEs", JSON.stringify(listCWEs)); // apply json stringify to convert an array to a string and be able to pass it in a request

    let objOptionsFetch =   {
        method: "POST",
        headers: new Headers(),
        body: formData
    }

    fetchRequest("middleware/universalController.php", objOptionsFetch).then(data => {
        let div = document.createElement("div");
        div.setAttribute("class", "alert alert-primary");
        div.innerText = "El elegido fue: " + data;
        parentNode.appendChild(div);
    });

}

function getParentNode(element)
{
    return element.parentNode;
}

function pushElementsList(list)
{
    for (let index = 0; index < list.length; index++)
    {
        const element = list[index];
        listCWEs.push(element.innerText);
    }
}

async function fetchRequest(input, options)
{    
    var request = new Request(input, options);
    const response = await fetch(request);
    return response.json();
}

function removeElementsByClass(className)
{
    document.querySelectorAll(className).forEach(el => el.remove());
}