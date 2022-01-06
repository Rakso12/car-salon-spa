function loadMenu(locale)
{
    fetch(`menu-${locale}.xml`).then(async (response) => {
        const xml = new window.DOMParser().parseFromString(
          await response.text(),
          "text/xml"
        );

        const xmlMenu = xml.querySelector("menu");
        const xmlMenuItem = Array.from(xmlMenu.querySelectorAll("item"));

        const items = xmlMenuItem
            .map((item) => {
            const href = item.children[0].childNodes[0].nodeValue;
            return href;
            });
        
        document.querySelector("#nav-home").innerHTML = items[0];
        document.querySelector("#nav-offer").innerHTML = items[1];
        document.querySelector("#nav-contact").innerHTML = items[2];
        document.querySelector("#nav-sign-in").innerHTML = items[3];
    });
    
}
/*
const languages = [
    ["pl", "Polski"],
    ["en", "English"]
];

function loadMenu(languages, language) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            displayMenu(this);
            menuLanguageSelection(languages, this);
        }
    };

    switch(language) {
        case languages[0][0]:
            console.log("1");
            xmlhttp.open("GET", "/menu-pl.xml" , true);
        break;
        
        case languages[1][0]:
            xmlhttp.open("GET", "/menu-eng.xml" , true);
        break;
        
        default:
            xmlhttp.open("GET", "/me" , true);
        }
        console.log(xmlhttp);

        xmlhttp.send();
}

function displayMenu(xml) {
    var x, i, xmlDoc, list;
    xmlDoc = xml.responseXML;
    list = '<ul>';
    x = xmlDoc.getElementsByTagName("item");
    
    for (i = 0; i < x.length; i++) {
        list += '<li><a href="' +
        x[i].getElementsByTagName("link")[0].childNodes[0].nodeValue + '">'
        + x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue + '</a></li>';
    }
    
    list += '</ul>';
    document.getElementsByClassName("menu")[0].innerHTML = list;
}

function menuLanguageSelection(languages, xml) {
    var i, j, xmlDoc, lang, language, selectionList;
    
    xmlDoc = xml.responseXML;
    language = xmlDoc.getElementsByTagName("language")[0].childNodes[0].nodeValue;
    selectionList = '<select class="lang" id="lang">';
    
    for (i = 0; i < languages.length; i++) {
        selectionList += '<option value="' + languages[i][0] + '"';
        
        if(languages[i][1] == language) {
            selectionList += ' selected';
        }
        
        selectionList += '>' + languages[i][1] + '</option>';
    }
    
    selectionList += '</select>';
    document.getElementsByClassName("language")[0].innerHTML = selectionList;
    document.getElementById("lang").addEventListener("change", function() {
    lang = document.getElementById("lang").value;
    
    localStorage.setItem("langkey", lang);
    console.log(localStorage.getItem("langkey"));
    
    loadMenu(languages, lang);
    });
}
*/