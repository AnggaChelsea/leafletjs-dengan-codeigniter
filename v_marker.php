 
    

    <script src="<?= base_url(); ?>dist/leaflet.browser.print.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://www.jqueryscript.net/demo/jQuery-Plugin-To-Print-Any-Part-Of-Your-Page-Print/jQuery.print.js"></script>
    
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.5/leaflet.css" />
    
    <script src="http://cdn.leafletjs.com/leaflet-0.7.5/leaflet.js"></script>
    <script src="http://apps2.geosmart.co.nz/mapfish-print/pdf/info.json?var=printConfig"></script>

    <div class="text">
        <!-- <h3>Titik</h3> -->
    </div>
      <div class="main-content" style="margin-top:-40px;">
        <div id="map" style="height:500px">
        </div>
    
        <script>

            var map = L.map('map').setView([-6.923648, 107.615584], 6);

            L.tileLayer('//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            

            L.control.browserPrint({
                printLayer:  L.tileLayer('//stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}.png', {
                                attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                                subdomains: 'abcd',
                                minZoom: 0,
                                maxZoom: 20
                            }),
                closePopupsOnPrint: false,
            }).addTo(map);


            // Dom manipulation with objects, that you have reference, can be made only here. But you need you revert changes in 'browser-print-end' manually.
            map.on("browser-pre-print", function(e) {
                red.setStyle({fill: false});
            });

            map.on("browser-print-start", function(e) {
                // Green circle;
                e.printObjects["L.Circle"][1].setStyle({fillColor: "orange"});
                e.printObjects["L.Circle"][1].setRadius(312330);
            });

            map.on("browser-print-end", function(e) {
                red.setStyle({fill: true});
            });

        </script>
        <script src="dist/leaflet.browser.print.min.js"></script>

<button id="printBtn" onclick="print();">Print map</button>
        <div class="section-body">
        </div>
    </section>
</div>
</div>

<style type="text/css">
    <style leaflet-browser-print-content>
    .grid-print-container { // grid holder that holds all content (map and any other content)
        grid-template: auto 1fr auto / 1fr;
        background-color: orange;
    }
    .grid-map-print { // map container itself
        grid-row: 1;
    }
    .title { // Dynamic title styling
        grid-row: 1;
        justify-self: center;
        color: white;
    }
    .sub-content { // Dynamic sub content styling
        grid-row: 0;
        padding-left: 5px;
    }
</style>


<div class="section-body">
</div>
</section>
</div>
</div>
</div>
