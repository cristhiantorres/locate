/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 44);
/******/ })
/************************************************************************/
/******/ ({

/***/ 44:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(45);


/***/ }),

/***/ 45:
/***/ (function(module, exports) {

var map = null;

var infoWindow = null;

var myLatlng = null;

var marker;

var pos = null;

$(document).ready(function () {

  initAutocomplete();

  if (navigator.geolocation) {

    navigator.geolocation.getCurrentPosition(function (position) {

      pos = {

        lat: position.coords.latitude,

        lng: position.coords.longitude

      };

      $('#latitude').val(pos.lat);

      $('#longitude').val(pos.lng);

      myLatlng = new google.maps.LatLng(pos);

      var myOptions = {

        zoom: 18,

        center: myLatlng,

        mapTypeId: google.maps.MapTypeId.ROADMAP

      };

      map = new google.maps.Map($('#map_canvas').get(0), myOptions);

      infoWindow = new google.maps.InfoWindow();

      marker = new google.maps.Marker({

        position: myLatlng,

        draggable: true,

        map: map,

        zoom: 18,

        title: 'Arrastrar a la ubicacion del negocio'

      });

      google.maps.event.addListener(map, 'click', function (event) {

        setMarker(event.latLng);
      });
    });
  }
});

function initAutocomplete() {

  map = new google.maps.Map(document.getElementById('map_canvas'), {

    center: pos,

    zoom: 13

  });

  // Create the search box and link it to the UI element.
  var input = document.getElementById('pac-input');

  var searchBox = new google.maps.places.SearchBox(input);

  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  // Bias the SearchBox results towards current map's viewport.
  map.addListener('bounds_changed', function () {

    searchBox.setBounds(map.getBounds());
  });

  var markers = [];

  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener('places_changed', function () {

    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markers.forEach(function (marker) {

      marker.setMap(null);
    });

    markers = [];

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();

    places.forEach(function (place) {

      if (!place.geometry) {

        console.log("Returned place contains no geometry");

        return;
      }

      setMarker(place.geometry.location);

      if (place.geometry.viewport) {

        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {

        bounds.extend(place.geometry.location);
      }
    });

    map.fitBounds(bounds);
  });
}

function setMarker(location) {

  if (marker) {

    marker.setPosition(location);
  } else {

    marker = new google.maps.Marker({

      position: location,

      draggable: true,

      map: map,

      zoom: 18,

      title: 'Arrastrar a la ubicacion del negocio'

    });
  }

  $('#latitude').val(marker.position.lat());

  $('#longitude').val(marker.position.lng());
}

/***/ })

/******/ });