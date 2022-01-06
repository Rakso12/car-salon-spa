$(document).ready(function () {
            
    let timer = setInterval(photo_change, 3000);
    let photo_counter = 1

    function photo_replace()
    {
    if (photo_counter == 0)
    {
        document.querySelector("#carusel").innerHTML = "<img style='height: 100%; object-fit: cover; width: 100%' src='https://images.pexels.com/photos/7459482/pexels-photo-7459482.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'></img>";
        console.log("ok111");
    }
    else if (photo_counter == 1)
    {
        document.querySelector("#carusel").innerHTML = "<img style='height: 100%; object-fit: cover; width: 100%' src='https://images.pexels.com/photos/10256428/pexels-photo-10256428.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'></img>";
        console.log("ok222");
    }
    else
    {
        document.querySelector("#carusel").innerHTML = "<img style='height: 100%; object-fit: cover; width: 100%' src='https://images.pexels.com/photos/9513355/pexels-photo-9513355.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'></img>";
        console.log("ok333");
    }
    if (photo_counter < 2)
        photo_counter++;
    else
        photo_counter = 0;
    }

    function photo_change() {
        console.log("tamm jestem");
        $("#carusel").fadeOut(3000, photo_replace);
        
        $("#carusel").fadeIn(3000);
        console.log("tu jestem");
      }
});