var myLatlng = { lat: -25.363, lng: 131.044 };
var infoWindow;
async function initMap() {
    
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        
    } 
    
    async function showPosition(position){
        myLatlng = {lat: position.coords.latitude, lng: position.coords.longitude};
        document.getElementById('coord').value=position.coords.latitude+","+position.coords.longitude;

        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 17,
            center: myLatlng,
        });
        // Create the initial InfoWindow.
        infoWindow = new google.maps.InfoWindow({
        content: "Pick the position of showroom",
        position: myLatlng,
        });
    
        infoWindow.open(map);
        // Configure the click listener.
        map.addListener("click", (mapsMouseEvent) => {
        // Close the current InfoWindow.
        infoWindow.close();
        // Create a new InfoWindow.
        infoWindow = new google.maps.InfoWindow({
            position: mapsMouseEvent.latLng,
        });
        document.getElementById('coord').value=mapsMouseEvent.latLng.toJSON().lat+","+mapsMouseEvent.latLng.toJSON().lng;
        infoWindow.setContent(
            message(document.getElementById('branchname').value,document.getElementById('contact').value,document.getElementById('addr').value, document.getElementById('coord').value)
        );
        infoWindow.open(map);
        });
    }
    
    
  }

  function setContentMap(){
    
    infoWindow.setContent(
        message(document.getElementById('branchname').value,document.getElementById('contact').value,document.getElementById('addr').value, document.getElementById('coord').value)
    );
}

function message(name, phone, addr, coord){
    
    return `<div dir="ltr" jstcache="0" style="">
    <div jstcache="33" class="poi-info-window gm-style"> 
      <div jstcache="2"> 
          <div jstcache="3" class="title full-width" jsan="7.title,7.full-width">`+name+`</div> 
          <div class="address"> <div jstcache="4" jsinstance="0" class="address-line full-width" jsan="7.address-line,7.full-width">`+phone+`</div>
          <div jstcache="4" jsinstance="1" class="address-line full-width" jsan="7.address-line,7.full-width">`+addr+`</div>
          
      </div> 
    </div> 
    <div jstcache="5" style="display:none"></div> 
    <div class="view-link"> 
      <a target="_blank" jstcache="6" href="https://maps.google.com/maps?ll=`+coord+`&amp;z=17&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3&amp;" tabindex="0"> 
          <span> View on Google Maps </span> 
      </a> 
    </div> 
  </div>
  </div>`;
}

  