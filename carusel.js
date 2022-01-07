$(document).ready(function () {
            
    let timer = setInterval(photo_change, 2000);
    let photo_counter = 1

    function photo_replace()
    {
    if (photo_counter == 0)
    {
        document.querySelector("#carusel").innerHTML = "<img style='height: 100%; object-fit: cover; width: 100%' src='https://images.pexels.com/photos/638479/pexels-photo-638479.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'></img>";
    }
    else if (photo_counter == 1)
    {
        document.querySelector("#carusel").innerHTML = "<img style='height: 100%; object-fit: cover; width: 100%' src='https://images.pexels.com/photos/6072020/pexels-photo-6072020.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'></img>";
    }
    else
    {
        document.querySelector("#carusel").innerHTML = "<img style='height: 100%; object-fit: cover; width: 100%' src='https://images.pexels.com/photos/544542/pexels-photo-544542.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'></img>";
    }
    if (photo_counter < 2)
        photo_counter++;
    else
        photo_counter = 0;
    }

    function photo_change() {
        $("#carusel").fadeOut(3000, photo_replace);
        $("#carusel").fadeIn(3000);
      }
});