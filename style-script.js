if(localStorage.hasOwnProperty('locale'))
{
    if(localStorage.getItem("locale") === "eng"){
        loadMenu(localStorage.getItem("locale")); 

        const lang_switch_pl = document.querySelector("#lang-switcher-pl");
        const lang_switch_eng = document.querySelector("#lang-switcher-eng");
        
        if (lang_switch_pl || lang_switch_eng) {
            lang_switch_pl.classList.toggle("hidden");
            lang_switch_eng.classList.toggle("hidden");
        }        
    }
}
else{
    loadMenu("pl");
    localStorage.setItem("locale", "pl");
}

// To open and close menu in responsive display
document.querySelector("#hamburger-btn").addEventListener("click", () => {
    const menu = document.querySelector("#menu");

    if (menu) {
        menu.classList.toggle("hidden");
    }
});

document.querySelector(".lang-switcher").addEventListener("click", () => {
    changeLanguage();
});

function changeLanguage(){
    const lang_switch_pl = document.querySelector("#lang-switcher-pl");
    const lang_switch_eng = document.querySelector("#lang-switcher-eng");

    if (lang_switch_pl || lang_switch_eng) {
        lang_switch_pl.classList.toggle("hidden");
        lang_switch_eng.classList.toggle("hidden");
        if(localStorage.getItem("locale") == "pl"){
            loadMenu("eng");
            localStorage.setItem("locale","eng");
        }
        else if(localStorage.getItem("locale") == "eng"){
            loadMenu("pl");
            localStorage.setItem("locale","pl");
        }
        else{
            loadMenu("pl");    
            localStorage.setItem("locale","pl");
        }
    }
}