function getModels() {

    var url = "/carsalon/models.json";
    $.getJSON(url, function (data) {

        let models = data.models;
        let result = '<table class="table-auto w-full"> <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50"> <tr> <th class="p-2 whitespace-nowrap"> <div class="font-semibold text-center">Photo</div> </th> <th class="p-2 whitespace-nowrap"> <div class="font-semibold text-center">Make</div> </th> <th class="p-2 whitespace-nowrap"> <div class="font-semibold text-center">Model</div> </th> <th class="p-2 whitespace-nowrap"> <div class="font-semibold text-center">Distance</div> </th> <th class="p-2 whitespace-nowrap"> <div class="font-semibold text-center">Price</div> </th> <th class="p-2 whitespace-nowrap"> <div class="font-semibold text-center"> Show info </div> </th> </tr> </thead><tbody class="text-sm divide-y divide-gray-100">';
        for (let i = 0; i < models.length; i++)
        {
            result += '<tr>';
            result += '<td class="p-2 whitespace-nowrap"> <div class="flex justify-center items-center"> <div class="w-36 h-24 flex-shrink-0"><img class="rounded-md min-w-full min-h-full" src="' + models[i].imgHref + '" alt=" '+ models[i].make + models[i].model +'"></div></div></td>';
            result += '<td class="p-2 whitespace-nowrap"> <div class="text-center text-lg text-blue-900">' + models[i].make + '</div> </td>';
            result += '<td class="p-2 whitespace-nowrap"> <div class="text-center text-lg text-blue-900">' + models[i].model + '</div> </td>';
            result += '<td class="p-2 whitespace-nowrap"> <div class="text-center text-lg text-blue-900">' + models[i].distance + '</div> </td>';
            result += '<td class="p-2 whitespace-nowrap"> <div class="text-center text-lg text-blue-900">' + models[i].price + '</div> </td>';
            result += '<td class="p-2 whitespace-nowrap"> <a href="'+ models[i].href + '" class="block"> <div class="text-center"><button class="h-10 px-5 m-2 text-white text-lg transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700"> More info </button></div> </a> </td>';
            result += '</tr>';
        }
        result += '</tbody> </table>';
        $('#models_table').html(result);
    });
};
function loadXML() {
  loadXMLFilename("lokacje.xml");
}


function loadXMLFilename(filename) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          initMap(this)
      }
  };
  xmlhttp.open("GET", filename, true);

  xmlhttp.send();
}

function initMap(xml) {
  let reponse = xml.responseXML;
  let lokacje = reponse.getElementsByTagName("lokacja");
  Lokacje = [];
  for (i = 0; i < lokacje.length; i++) {
    Lokacje[i] = {
          lat: Number(lokacje[i].getElementsByTagName("lat")[0].childNodes[0].nodeValue) ,
          lng: Number(lokacje[i].getElementsByTagName("lng")[0].childNodes[0].nodeValue)
      }
  }
  const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 7,
      center: Lokacje[2],
  });
  for (i = 0; i < Lokacje.length; i++) {
      new google.maps.Marker({
          position: Lokacje[i],
          map: map,
      });
  }
}

function getMap(){
    $.getScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyDVMG5B8JrvyGFtsYFDU9fJqfcgY4fwAT4&callback=loadXML&v=weekly");
}

function getStyle(){
    $.getScript("contact-style.js");
}

function getChart(){
    $.getScript("chart.js");
}


function getCookie(cookieName) {
    var name = cookieName + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var cookies = decodedCookie.split(";");
    var cookieValue = "";
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        while (cookie.charAt(0) == " ") {
            cookie = cookie.substring(1);
        }
        if (cookie.indexOf(name) == 0) {
            cookieValue = cookie.substring(name.length, cookie.length);
            return cookieValue;
        }
    }
    return cookieValue;
}

function getUser(){
    let name = getCookie("user-name");
    let email = getCookie("user-email");
    let username = getCookie("user-username");

    document.querySelector("#user-name").innerHTML = name;
    document.querySelector("#user-username").innerHTML = username;
    document.querySelector("#user-email").innerHTML = email;
}

var spapp = angular.module("mySPA", ["ngRoute"]);
spapp.config(function($routeProvider) {
    $routeProvider
    .when("", {
        templateUrl: "home.php",
    })
    .when("/home", {
        templateUrl: "home.php",
    })
    .when("/offer", {
        templateUrl: "offer.php",
        controller: "ModelCtrl",
        controllerAs:"model"
    })
    .when("/contact", {
        templateUrl: "contact.php",
        controller: "MapCtrl",
        controllerAs:"map"
    })
    .when("/sign-in", {
        templateUrl: "sign-in.php",
    })
    .when("/sign-up", {
        templateUrl: "sign-up.php",
    })
    .when("/car", {
        templateUrl: "car.php",
    })
    .when("/profile", {
        templateUrl: "profile.php",
        controller: "UserCtrl",
        controllerAs:"user"
    })
    .when("/error", {
        templateUrl: "error.php",
    })
    .otherwise("/error");
});

spapp.controller('ModelCtrl', ['$routeParams', function ModelCtrl($route, $routeParams, $location){
    this.name = 'ModelCtrl';
    this.params = $routeParams;
    getModels();  
}]);
spapp.controller('MapCtrl', ['$routeParams', function MapCtrl($route, $routeParams, $location){
  this.name = 'MapCtrl';
  this.params = $routeParams;
  getMap();
  getStyle(); 
}]);
spapp.controller('UserCtrl', ['$routeParams', function UserCtrl($route, $routeParams, $location){
    this.name = 'UserCtrl';
    this.params = $routeParams;
    getUser();  
    //getChart();
}]);
