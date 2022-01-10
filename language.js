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
        try{
            document.querySelector("#nav-sign-in").innerHTML = items[3];
        } catch( e ) {
        }
        try{
            document.querySelector("#nav-sign-out").innerHTML = items[4];
        } catch( e ) {
        }
    });
}