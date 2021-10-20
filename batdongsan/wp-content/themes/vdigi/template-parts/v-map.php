<?php
$v_company_map = get_field('v_company_map', 'option');
if ($v_company_map):
    echo $v_company_map;
else:
    $company_map_x_y = get_field('v_company_map_x_y', 'option');
    if ($company_map_x_y):
        $company_logo = get_field('logo', 'option')['url'];
        $company_name = get_field('ten_cong_ty', 'option');
        $company_address = get_field('dia_chi', 'option');

        $set_width = '100%';
        $set_height = '300px';
        if ($args['width'] != '') {
            $set_width = $args['width'];
        }

        if ($args['height'] != '') {
            $set_height = $args['height'];
        }
        ?>
        <style>
            #mapCanvas {
                width: <?php echo $set_width; ?>;
                min-height: <?php echo $set_height; ?>;
                overflow: hidden;
                position: relative
            }

            .content-map {
                position: relative;
                width: 400px
            }

            .content-map img {
                max-width: 100px;
                max-height: 60px;
                object-fit: cover;
                float: left;
                margin-right: 10px
            }

            .content-map .copy {
                padding-left: 13px;
                line-height: 20px;
                background: #fff
            }

            .content-map .copy p {
                color: #000;
                font-size: 13px
            }
        </style>
        <div class="google-map">
            <div class="map-wrap">
                <div id="mapCanvas"></div>
            </div>
            <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCbtMrti_QU49PZjiYdyuNJoXC7rUmbUvs"></script>
            <script>
                function initialize() {
                    "use strict";
                    var mapOptions = {
                        zoom: 15,
                        scrollwheel: false,
                        center: new google.maps.LatLng(<?php echo $company_map_x_y ?>),
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        styles: [
                            {
                                "featureType": "water",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#e9e9e9"
                                    },
                                    {
                                        "lightness": 17
                                    }
                                ]
                            },
                            {
                                "featureType": "landscape",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#f5f5f5"
                                    },
                                    {
                                        "lightness": 20
                                    }
                                ]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "geometry.fill",
                                "stylers": [
                                    {
                                        "color": "#ffffff"
                                    },
                                    {
                                        "lightness": 17
                                    }
                                ]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "geometry.stroke",
                                "stylers": [
                                    {
                                        "color": "#ffffff"
                                    },
                                    {
                                        "lightness": 29
                                    },
                                    {
                                        "weight": 0.2
                                    }
                                ]
                            },
                            {
                                "featureType": "road.arterial",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#ffffff"
                                    },
                                    {
                                        "lightness": 18
                                    }
                                ]
                            },
                            {
                                "featureType": "road.local",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#ffffff"
                                    },
                                    {
                                        "lightness": 16
                                    }
                                ]
                            },
                            {
                                "featureType": "poi",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#f5f5f5"
                                    },
                                    {
                                        "lightness": 21
                                    }
                                ]
                            },
                            {
                                "featureType": "poi.park",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#dedede"
                                    },
                                    {
                                        "lightness": 21
                                    }
                                ]
                            },
                            {
                                "elementType": "labels.text.stroke",
                                "stylers": [
                                    {
                                        "visibility": "on"
                                    },
                                    {
                                        "color": "#ffffff"
                                    },
                                    {
                                        "lightness": 16
                                    }
                                ]
                            },
                            {
                                "elementType": "labels.text.fill",
                                "stylers": [
                                    {
                                        "saturation": 36
                                    },
                                    {
                                        "color": "#333333"
                                    },
                                    {
                                        "lightness": 40
                                    }
                                ]
                            },
                            {
                                "elementType": "labels.icon",
                                "stylers": [
                                    {
                                        "visibility": "off"
                                    }
                                ]
                            },
                            {
                                "featureType": "transit",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#f2f2f2"
                                    },
                                    {
                                        "lightness": 19
                                    }
                                ]
                            },
                            {
                                "featureType": "administrative",
                                "elementType": "geometry.fill",
                                "stylers": [
                                    {
                                        "color": "#fefefe"
                                    },
                                    {
                                        "lightness": 20
                                    }
                                ]
                            },
                            {
                                "featureType": "administrative",
                                "elementType": "geometry.stroke",
                                "stylers": [
                                    {
                                        "color": "#fefefe"
                                    },
                                    {
                                        "lightness": 17
                                    },
                                    {
                                        "weight": 1.2
                                    }
                                ]
                            }
                        ]
                    };

                    var map = new google.maps.Map(document.getElementById('mapCanvas'), mapOptions);
                    var marker = new google.maps.Marker({
                        position: map.getCenter(),
                        map: map,
                        title: 'Location Name',
                        // animation: google.maps.Animation.BOUNCE
                    });
                    var infowindow = new google.maps.InfoWindow({
                        content: '<div class="content-map"><img src="<?php echo $company_logo; ?>"><div class="copy"><p><strong><?php echo $company_name; ?></strong><br/><?php echo $company_address; ?></p></div></div>'
                    });
                    infowindow.open(map, marker);
                }

                google.maps.event.addDomListener(window, 'load', initialize);
            </script>
        </div>

    <?php endif; ?>
<?php endif; ?>
