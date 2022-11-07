<div class="container-fluid">
<div class="row">


        <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-dark text-white">
                MapBox
            </div>
            <div class="card-body">
            <div id='map' style='width: 100%; height: 600px;'></div>
            </div>
        </div>
        </div>
        <div class="col-md-4">
        <div class="card-header bg-dark text-white">
                Form
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Longtitude</label>
                                <input type="text" id="long" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                                <label>Lattitude</label>
                                <input type="text" id="lat" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

@push('scripts')
<script>
    document.addEventListener('livewire:load', () => {
        // membuat defaultlocation
        const defaultlocation = [114.14664271461163, -8.364576044630695]

        mapboxgl.accessToken = '{{env("MAPBOX_KEY")}}';
        var map = new mapboxgl.Map({
            container: 'map',
            center: defaultlocation,
            zoom: 11.15,
        });

        const geoJson = {
        "type": "FeatureCollection",
        "features": [
            {
            "type": "Feature",
            "geometry": {
                "coordinates": [
                "114.12702670386034",
                "-8.35391340051872"
                ],
                "type": "Point"
            },
            "properties": {
                "message": "Mantap",
                "iconSize": [
                50,
                50
                ],
                "locationId": 30,
                "title": "Hello new",
                "image": "1a1eb1e4106fff0cc3467873f0f39cab.jpeg",
                "description": "Mantap"
            }
            },
            {
            "type": "Feature",
            "geometry": {
                "coordinates": [
                "114.17190251204016",
                "-8.334928259281682"
                ],
                "type": "Point"
            },
            "properties": {
                "message": "oke mantap Edit",
                "iconSize": [
                50,
                50
                ],
                "locationId": 29,
                "title": "Rumah saya Edit",
                "image": "0ea59991df2cb96b4df6e32307ea20ff.png",
                "description": "oke mantap Edit"
            }
            },
            {
            "type": "Feature",
            "geometry": {
                "coordinates": [
                "114.20347032193263",
                "-8.347483052802815"
                ],
                "type": "Point"
            },
            "properties": {
                "message": "Update Baru",
                "iconSize": [
                50,
                50
                ],
                "locationId": 22,
                "title": "Update Baru Gambar",
                "image": "d09444b68d8b72daa324f97c999c2301.jpeg",
                "description": "Update Baru"
            }
            },
            {
            "type": "Feature",
            "geometry": {
                "coordinates": [
                "114.19604260195933",
                "-8.41086327370526"
                ],
                "type": "Point"
            },
            "properties": {
                "message": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                "iconSize": [
                50,
                50
                ],
                "locationId": 19,
                "title": "awdwad",
                "image": "f0b88ffd980a764b9fca60d853b300ff.png",
                "description": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
            }
            },
            {
            "type": "Feature",
            "geometry": {
                "coordinates": [
                "114.16107042041051",
                "-8.397085843902417"
                ],
                "type": "Point"
            },
            "properties": {
                "message": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                "iconSize": [
                50,
                50
                ],
                "locationId": 18,
                "title": "adwawd",
                "image": "4c35cb1b76af09e6205f94024e093fe6.jpeg",
                "description": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
            }
            },
            {
            "type": "Feature",
            "geometry": {
                "coordinates": [
                "114.22389655186515",
                "-8.36799855366749"
                ],
                "type": "Point"
            },
            "properties": {
                "message": "awdwad",
                "iconSize": [
                50,
                50
                ],
                "locationId": 12,
                "title": "adawd",
                "image": "7c8c949fd0499eb50cb33787d680778c.jpeg",
                "description": "awdwad"
            }
            }
        ]
        }

        loadLocations = () => {
            geoJson.features.forEach((location) => {
                const {geometry, properties} = location
                const {iconSize, locationId, title, image, description} = properties

                let markerElement = document.createElement('div')
                markerElement.className = 'marker' + locationId
                markerElement.id = locationId
                markerElement.style.backgroundImage = 'url(https://docs.mapbox.com/help/demos/custom-markers-gl-js/mapbox-icon.png)'
                markerElement.style.backgroundSize = 'cover'
                markerElement.style.width = '50px'
                markerElement.style.height = '50px'

                new mapboxgl.Marker(markerElement)
                .setLngLat(geometry.coordinates)
                .addTo(map)
            })
        }
        loadLocations();

        //warna map
        const style = "streets-v11"
        //light-v10, outdoors-v11, satellite-v9, streets-v11, dark-v10
        map.setStyle(`mapbox://styles/mapbox/${style}`)

        //control jahu dekat
        map.addControl(new mapboxgl.NavigationControl())

        map.on('click', (e) => {
            const longtitude = e.lngLat.lng
            const lattitude = e.lngLat.lat

            document.getElementById('long').value = longtitude
            document.getElementById('lat').value = lattitude
        })

    })
</script>

@endpush
