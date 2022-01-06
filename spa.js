var spapp = angular.module("mySPA", ["ngRoute"]);
spapp.config(function($routeProvider) {
    $routeProvider
    .when("/home", {
        templateUrl: "home.php",
    })
    .when("/offer", {
        templateUrl: "offer.php",
    })
    .when("/contact", {
        templateUrl: "contact.php",
    })
    .when("/sign-in", {
        templateUrl: "sign-in.php",
    })
    .otherwise("error.php");
});