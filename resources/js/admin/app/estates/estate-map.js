/* Google maps */


import {Loader, LoaderOptions} from 'google-maps';
import { Notify } from '../../layout/notify.ts';
// or const {Loader} = require('google-maps'); without typescript

const options = {/* todo */};
const loader = new Loader('AIzaSyAApiBLPehhhJkDFqzlfNGN99n18N4PZxA', options);

if($("#change-map").length){
    let latitude = parseFloat(($("#latitude").val() !== '') ? $("#latitude").val() : '44.9654152') ;
    let longitude = parseFloat(($("#longitude").val() !== '') ? $("#longitude").val() : '15.9223333' );

    console.log(latitude, longitude);


    loader.load().then(function (google) {
        let map = new google.maps.Map(document.getElementById('change-map'), {
            center: {lat: latitude, lng: longitude },
            zoom: 16,
            // fullscreenControl: false,

        });

        let location = new google.maps.LatLng(latitude,  longitude);
        let marker = new google.maps.Marker({
            position: location,
            map: map,
            draggable: true
        });

        /* Get coordinates while moving */
        google.maps.event.addListener(marker, 'dragend', function() {
            let latLng = marker.getPosition();
            let currentLatitude = latLng.lat();
            let currentLongitude = latLng.lng();

            $.ajax({
                url: "/system/estates/google-map/update-location",
                method: "POST",
                dataType: "json",
                data: {
                    lat : currentLatitude,
                    lon : currentLongitude,
                    id : $("#estate-id").val()
                },
                success: function success(response) {
                    let code = response['code'];

                    if(code === '0000'){
                        Notify.Me([response['message'], "success"]);
                    }else{
                        Notify.Me([response['message'], "warn"]);
                    }

                }
            });
            console.log(currentLatitude);
            console.log(currentLongitude);
        });
    });
}


