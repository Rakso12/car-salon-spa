<!DOCTYPE html>
<html lang="pl" dir="ltr">
    <head>
        <meta charset="utf-8"/>
        <title> PHP -Single Page Application </title>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular-route.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>

        
        <script src="language.js"></script>
        <script src="style-script.js" defer></script>

        <script> localStorage.setItem('locale','pl'); </script>
        
    </head>
    <body ng-app="mySPA">
        <nav class="z-40 inset-x-0 top-0 fixed flex items-center justify-between flex-wrap bg-slate-50 p-3 shadow-md">
            
            <div class="flex items-center flex-shrink-0 text-white mr-6">
                <a href="#!home" class="block mt-4 lg:inline-block px-4 lg:mt-0 text-blue-900 hover:font-medium">
                    <svg width="164" height="26" xmlns="http://www.w3.org/2000/svg" version="1.1">
                        <path stroke="null" fill="#1e3a8a" d="m12.86021,8.11154l-0.55523,-2.31749s-1.13461,-0.38625 -2.70374,-0.38625c-2.53476,0 -3.98319,1.88296 -3.98319,5.91444c0,3.91077 1.56914,5.55233 4.1039,5.55233c2.41406,0 4.58671,-1.68984 4.58671,-1.68984l1.32773,2.17265s-2.53476,2.63132 -6.32483,2.63132c-4.90053,0 -7.72498,-2.94515 -7.72498,-8.54576c0,-5.67303 3.18655,-9.05271 8.13537,-9.05271c2.92101,0 5.62475,1.13461 5.62475,1.13461l-0.1207,4.58671l-2.36578,0zm14.25524,11.58747l-0.43453,-1.56914s-1.85882,1.81054 -3.91077,1.81054c-2.34163,0 -3.76593,-1.37601 -3.76593,-3.79007c0,-2.84859 2.14851,-3.98319 5.81788,-3.98319l1.68984,0l0,-1.32773c0,-1.23117 -0.6518,-1.76226 -1.85882,-1.76226c-1.23117,0 -2.12437,0.36211 -2.12437,0.36211l-0.36211,1.52086l-2.17265,0l-0.16898,-3.5728s2.92101,-0.96562 5.2385,-0.96562c3.66937,0 5.06952,1.27945 5.06952,4.77983l0,5.96272l1.81054,0.43453l0,1.93125l-4.82811,0.16898zm-0.60351,-5.47991l-1.37601,0c-1.88296,0 -2.63132,0.48281 -2.63132,1.56914c0,0.91734 0.50695,1.44843 1.42429,1.44843c1.27945,0 2.58304,-1.40015 2.58304,-1.40015l0,-1.61742zm13.62759,-7.556l0.21727,1.6657s1.73812,-1.9071 3.35554,-1.9071c1.32773,0 2.24507,0.43453 2.24507,0.43453l-0.19312,4.63499l-2.17265,0l-0.36211,-2.05195c-1.40015,0 -2.60718,1.35187 -2.60718,1.35187l0,6.37311l2.41406,0.60351l0,1.93125l-7.96639,0l0,-1.93125l1.93125,-0.60351l0,-7.84568l-1.93125,-0.60351l0,-1.93125l5.06952,-0.1207zm10.39275,10.25974l0,-11.34607l-1.81054,-0.72422l0,-2.05195l5.55233,-0.1207l2.29335,0c4.82811,0 7.6767,2.84859 7.6767,8.28021s-3.13827,8.73888 -8.03881,8.73888l-7.48357,0l0,-2.05195l1.81054,-0.72422zm3.74179,-0.1207l2.00367,0c2.34163,0 3.91077,-1.37601 3.91077,-5.72131c0,-4.05561 -1.37601,-5.50405 -3.74179,-5.50405l-2.17265,0l0,11.22536zm25.48061,-2.82445l-8.01467,0c0.14484,1.93125 1.25531,3.06585 2.92101,3.06585c2.00367,0 4.05561,-1.13461 4.05561,-1.13461l1.03804,2.00367s-2.41406,2.02781 -5.50405,2.02781c-4.15218,0 -6.27655,-2.41406 -6.27655,-6.51795c0,-4.2246 2.38992,-7.00076 6.44553,-7.00076c3.59694,0 5.47991,2.22093 5.47991,5.67303c0,0.91734 -0.14484,1.81054 -0.14484,1.88296zm-7.96639,-2.24507l4.36944,0c0,-1.37601 -0.57937,-2.41406 -1.97953,-2.41406c-1.35187,0 -2.19679,0.98976 -2.38992,2.41406zm16.69344,5.43163l2.17265,0.60351l0,1.93125l-7.74912,0l0,-1.93125l1.93125,-0.60351l0,-13.567l-1.93125,-0.48281l0,-1.93125l5.57647,-0.19312l0,16.17418zm6.313,-14.48434c0,-1.37601 0.98976,-2.17265 2.07609,-2.17265c1.25531,0 2.02781,0.6518 2.02781,2.17265c0,1.42429 -1.03804,2.19679 -2.02781,2.19679c-1.30359,0 -2.07609,-0.7725 -2.07609,-2.19679zm4.05561,14.48434l1.68984,0.60351l0,1.93125l-7.24217,0l0,-1.93125l1.93125,-0.60351l0,-7.84568l-1.93125,-0.60351l0,-1.93125l5.55233,-0.1207l0,10.50115zm12.10673,-8.4492l0,-1.93125l6.32483,-0.1207l0,2.05195l-1.37601,0.31383l-3.88663,10.67013l-3.98319,0l-3.81421,-10.59771l-1.15875,-0.38625l0,-1.93125l6.32483,-0.1207l0,2.05195l-1.35187,0.24141l2.19679,7.12147l2.12437,-7.04904l-1.40015,-0.31383zm20.74906,5.26264l-8.01467,0c0.14484,1.93125 1.25531,3.06585 2.92101,3.06585c2.00367,0 4.05561,-1.13461 4.05561,-1.13461l1.03804,2.00367s-2.41406,2.02781 -5.50405,2.02781c-4.15218,0 -6.27655,-2.41406 -6.27655,-6.51795c0,-4.2246 2.38992,-7.00076 6.44553,-7.00076c3.59694,0 5.47991,2.22093 5.47991,5.67303c0,0.91734 -0.14484,1.81054 -0.14484,1.88296zm-7.96639,-2.24507l4.36944,0c0,-1.37601 -0.57937,-2.41406 -1.97953,-2.41406c-1.35187,0 -2.19679,0.98976 -2.38992,2.41406zm16.5486,-5.06952l0.21727,1.6657s1.73812,-1.9071 3.35554,-1.9071c1.32773,0 2.24507,0.43453 2.24507,0.43453l-0.19312,4.63499l-2.17265,0l-0.36211,-2.05195c-1.40015,0 -2.60718,1.35187 -2.60718,1.35187l0,6.37311l2.41406,0.60351l0,1.93125l-7.96639,0l0,-1.93125l1.93125,-0.60351l0,-7.84568l-1.93125,-0.60351l0,-1.93125l5.06952,-0.1207zm7.73729,2.05195l0,-1.93125l6.44553,-0.1207l0,2.05195l-1.35187,0.24141l2.14851,6.75936l2.05195,-6.68694l-1.40015,-0.31383l0,-1.93125l6.49381,-0.1207l0,2.05195l-1.49671,0.31383l-3.54866,9.89763c-1.15875,3.18655 -2.72788,6.56623 -6.56623,6.56623c-0.82078,0 -2.34163,-0.19312 -2.34163,-0.19312l0.33797,-2.58304l1.56914,0c1.93125,0 2.82445,-2.05195 3.23484,-2.99343l-4.29702,-10.62185l-1.27945,-0.38625z" id="svg_1"/>
                        <path fill="#" id="svg_2"/>
                    </svg>
                </a>
            </div>
            
            <div class="block lg:hidden">
                <button id="hamburger-btn" class="flex items-center px-3 py-2 border rounded text-blue-900 border-teal-400 hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                </button>
            </div>

            <div id="menu" class="hidden w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                <div class="text-base lg:flex-grow">
                    <a href="#!home" id="nav-home" class="block mt-4 lg:inline-block lg:mt-0 text-blue-900 hover:font-medium mr-4">
                        Start
                    </a>
                    <a href="#!offer" id="nav-offer" class="block mt-4 lg:inline-block lg:mt-0 text-blue-900 hover:font-medium mr-4">
                        Nasza Oferta
                    </a>
                    <a href="#!contact" id="nav-contact" class="block mt-4 lg:inline-block lg:mt-0 text-blue-900 hover:font-medium">
                        Kontakt
                    </a>
                </div>
                <div>
                    <div>
                        <div class="lang-switcher inline-block align-middle px-4">
                            <!-- Not toggled switch -->
                            <div class="w-full h-full flex flex-col justify-center items-center">
                                <div id="lang-switcher-pl" class="flex justify-center items-center ">
                                    <span class="">
                                        PL
                                    </span>
                                    <div class="w-14 h-7 flex items-center bg-gray-300 rounded-full mx-3 px-1 bg-gray-500">
                                        <!-- Switch -->
                                        <div class="bg-white w-5 h-5 rounded-full shadow-md transform" :class="{ 'translate-x-7': toggleActive}"></div>
                                    </div>
                                    <span class="">
                                        ENG
                                    </span>
                                </div>

                                <!-- Toggled switch -->
                                <div id="lang-switcher-eng" class="hidden flex justify-center items-center">
                                    <span class="">
                                    PL
                                    </span>
                                    <!-- Switch Container -->
                                    <div class="w-14 h-7 flex items-center bg-gray-300 rounded-full mx-3 px-1 bg-gray-500">
                                        <!-- Switch -->
                                        <div class="bg-white w-5 h-5 rounded-full shadow-md transform translate-x-7"></div>
                                    </div>
                                    <span class="">
                                        ENG
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="inline-block align-middle px-4">
                            <a href="#!sign-in" class="inline-block text-sm px-4 py-1 lg:items-center border rounded text-white border-white bg-blue-900 
                            hover:border-blue-900 hover:text-blue-900 hover:bg-white mt-4 lg:mt-0
                            "> 
                                <svg class="lg:inline-block h-8 w-8"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span id="nav-sign-in"> Zaloguj </span> 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>


        <div ng-view >
            
        </div>

        <script src="spa.js"></script>
    </body>
</html>