/* 
global variables
*/
let categorieInputMatch = {
    "1": ["recup"],
    "2": ["bio", "animal"],
    "3": ["bio", "animal", "recup"],
    "4": ["animal", "recup"],
    "5": ["provenance"]
};

let selector = "";

/* 
functions
*/

// hide all inputss
const hide = (arr) => {
    arr.forEach(el => {
        el.classList.add("d-none");
    })
}

const categoriesHandler = (e) => {
    if (e.target.tagName === "OPTION") {
        // initialization
        selector = "";
        hide(document.querySelectorAll('.changeable'));
        // constructing the selector in format [name="animal"],[name="bio"]
        categorieInputMatch[e.target.dataset.categorieGroup].forEach((categorie, i) => {
            selector += `[name="${categorie}"],`;
            if (i === categorieInputMatch[e.target.dataset.categorieGroup].length - 1) {
                selector = selector.substring(0, selector.length - 1);
            }
        });
        // remove unneeded inputs
        document.querySelectorAll(selector).forEach(el => {
            el.closest('div.mb-3').classList.remove("d-none");
        });
    }
}

// all event listeners
const eventListeners = () => {
    document.querySelector('.categorie-select').addEventListener("click", categoriesHandler);
}

// program initialization
const init = () => {
    hide(document.querySelectorAll('.changeable'));
    eventListeners();
}

window.addEventListener("DOMContentLoaded", init);

