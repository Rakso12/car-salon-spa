$(document).ready(function () {
        
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
                result += '<td class="p-2 whitespace-nowrap"> <a href="'+ models[i].href +'" class="block"> <div class="text-center"><button class="h-10 px-5 m-2 text-white text-lg transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700"> More info </button></div> </a> </td>';
                result += '</tr>';
            }
            result += '</tbody> </table>';
            $('#models_table').html(result);
        });

    };

    getModels();
});