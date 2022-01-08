
$(document).ready(function () {
    let item = document.querySelector("#contact-text1");

    let item1 = document.querySelector("#contact-text2");
    
    let item2 = document.querySelector("#contact-text3");

    let item3 = document.querySelector("#contact-text4");

    item.addEventListener("mouseover", changeStyle, false);
    item.addEventListener("mouseout", clearStyle, false);

    item1.addEventListener("mouseover", changeStyle1, false);
    item1.addEventListener("mouseout", clearStyle1, false);

    item2.addEventListener("mouseover", changeStyle2, false);
    item2.addEventListener("mouseout", clearStyle2, false);

    item3.addEventListener("mouseover", changeStyle3, false);
    item3.addEventListener("mouseout", clearStyle3, false);

    function changeStyle(){
        let text = document.querySelector("#contact-text1");
        text.style.color = "#1e3a8a";
        text.style.fontWeight = "700";
    }

    function clearStyle(){
        let text = document.querySelector("#contact-text1");
        text.style.color = "#000000";
        text.style.fontWeight = "400";
    }

    function changeStyle1(){
        let text = document.querySelector("#contact-text2");
        text.style.color = "#1e3a8a";
        text.style.fontWeight = "700";
    }

    function clearStyle1(){
        let text = document.querySelector("#contact-text2");
        text.style.color = "#000000";
        text.style.fontWeight = "400";
    }
    
    function changeStyle2(){
        let text = document.querySelector("#contact-text3");
        text.style.color = "#1e3a8a";
        text.style.fontWeight = "700";
    }

    function clearStyle2(){
        let text = document.querySelector("#contact-text3");
        text.style.color = "#000000";
        text.style.fontWeight = "400";
    }
    
    function changeStyle3(){
        let text = document.querySelector("#contact-text4");
        text.style.color = "#1e3a8a";
        text.style.fontWeight = "700";
    }

    function clearStyle3(){
        let text = document.querySelector("#contact-text4");
        text.style.color = "#000000";
        text.style.fontWeight = "400";
    }
});