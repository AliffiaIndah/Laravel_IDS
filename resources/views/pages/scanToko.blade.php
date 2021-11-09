@extends('layouts.mainlayout')
@section("page_title","IDS")

@section("title","Scanner")

@section("custom_css")
<!-- <link href="{{asset ('asset/scan/css/bootstrap.min.css')}}" rel="stylesheet"> -->
<!-- <link href="{{asset ('asset/scan/css/style.css')}}" rel="stylesheet"> -->

<!-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" > -->

<!-- <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet"> -->
@endsection


@section('tittle','Scanner Toko')

@section("breadcrumb")
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Scanner Toko</li>
@endsection

@section("content")
<!-- Default box -->

<div class="row">
    <section class="col-12 col-md-6 col-lg-6 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Scan Barcode</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
          </div>

          <div class="card-body">
      <!-- <div class="row"> -->
                <!-- <div class="col-12 col-md-6 col-lg-6 col-sm-12"> -->
                    <section class="container" id="demo-content">
                        <h3 class="title">Start to Scan Code from Video Camera</h3>

                        <div>
                            <a class="btn btn-primary" id="startButton">Start</a>
                            <a class="btn btn-success" id="resetButton">Reset</a>
                        </div>
                            <br>
                        <div align="conter">
                            <video id="video" width="470" height="300" style="border: 1px solid gray"></video>
                        </div>

                        <div id="sourceSelectPanel" style="display:none">
                            <label for="sourceSelect">Change video source:</label>
                            <select class="form-control" id="sourceSelect" style="max-width:400px">
                            </select>
                        </div>

                        <label>Result</label>
                        <code class="form-control" style="width:400px" name="result" id="result"></code>
                       <!--  <br>
                        <input href="findToko" class="btn btn-primary" type="button" id="find_toko" name="find_toko" value="Details"><br> -->
                    </div>
                </div>
            </section>
            

                <section class="col-12 col-md-6 col-lg-6 col-sm-12">
                    <div class="card bg-gradient-primary">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Toko</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-times"></i></button>
                                </button>
                            </div>
                        </div>

                    <div class="card-body">
                        <!-- Lokasi Toko -->
                        <div class="form-group">
                            <label>Nama Toko</label>
                            <input type="text" class="form-control" id="nama_toko1" name="nama_toko1" placeholder="" readonly>
                        </div>
                        <!-- <div class="form-group">
                            <label>Alamat Toko</label>
                            <input type="text" class="form-control" id="alamat_toko1" name="alamat_toko1" placeholder="" readonly>
                        </div> -->
                        <div class="form-group">
                            <label for="">Latitude</label>
                            <input type="text" class="form-control" id="latitude1" name="latitude1" placeholder="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Longitude</label>
                            <input type="text" class="form-control" id="longitude1" name="longitude1" placeholder="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Accuracy</label>
                            <input type="text" class="form-control" id="accuracy1" name="accuracy1" placeholder="" readonly>
                        </div>
                    </div>
                </div>


                <div class="card bg-gradient-info">
                        <div class="card-header">
                            <h3 class="card-title">Lokasi Sekarang</h3>
                            <div class="card-tools">
                                <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                      <!-- Lokasi Sekarang -->
                        <div class="form-group">
                            <label for="">Latitude</label>
                            <input type="text" class="form-control" id="latitude_now" name="latitude_now" placeholder="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Longitude</label>
                            <input type="text" class="form-control" id="longitude_now" name="longitude_now" placeholder="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Accuracy</label>
                            <input type="text" class="form-control" id="accuracy_now" name="accuracy_now" placeholder="" readonly>
                        </div>
                        <p id="demo">

                          <button type="submit" class="btn btn-outline-light" onclick="konfirmasi()">Submit</button>
                            
                           <!--  <button type="submit" class="btn btn-primary">Submit</button><br><br>  -->
                
              </div>
          </div>
        </section>
@endsection

@section("custom_js")


<script type="text/javascript" src="{{ URL::asset('js/filereader.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/qrcodelib.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/webcodecamjs.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
  var lat = document.getElementById("latitude1");
  var lon1 = document.getElementById("longitude1");
  var acc = document.getElementById("accuracy1");
  var latit = document.getElementById("latitude_now");
  var longit = document.getElementById("longitude_now");
  var accur = document.getElementById("accuracy_now");
    var x = document.getElementById("demo");
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(showPosition);
          
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
    latit.value = position.coords.latitude;
    longit.value= position.coords.longitude;
    accur.value= position.coords.accuracy;
    }

    function konfirmasi(){
      var lat = document.getElementById("latitude1").value;
      var lon = document.getElementById("longitude1").value;
      var acc = Number(document.getElementById("accuracy1").value);
      var latit = document.getElementById("latitude_now").value;
      var longit = document.getElementById("longitude_now").value;
      var accur = Number(document.getElementById("accuracy_now").value);
      var b = Number(getDistanceFromLatLonInKm(lat,lon,latit,longit)*1000);
      var rac = Number((acc+accur)/2);
      // console.log(acc);
      // console.log(lat);
      // console.log(lon);
      // console.log(acc);
      // console.log(latit);
      // console.log(longit);
      // console.log(rac);
      console.log(b);
      if (b <= rac) {
        alert("Anda berada dalam Jangkauan");
      } else {
        alert("Anda berada di Luar Jangkauan");
      }
    }

    function getDistanceFromLatLonInKm(lat,lon,latit,longit) {
      var R = 6371; // Radius of the earth in km
      var dLat = deg2rad(latit-lat); // deg2rad below
      var dLon = deg2rad(longit-lon);
      var a =
      Math.sin(dLat/2) * Math.sin(dLat/2) +
      Math.cos(deg2rad(lat)) * Math.cos(deg2rad(latit)) *
      Math.sin(dLon/2) * Math.sin(dLon/2)
      ;
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
      var d = R * c; // Distance in km
      return d;
    }
    function deg2rad(deg) {
      return deg * (Math.PI/180)
    }

</script>
  <script type="text/javascript" src="https://unpkg.com/@zxing/library@0.18.3-dev.7656630/umd/index.js"></script>
  <script type="text/javascript">
     
    window.addEventListener('load', function () {
      let selectedDeviceId;
      const codeReader = new ZXing.BrowserMultiFormatReader()
      console.log('ZXing code reader initialized')
      codeReader.listVideoInputDevices()
        .then((videoInputDevices) => {
          const sourceSelect = document.getElementById('sourceSelect')
          selectedDeviceId = videoInputDevices[0].deviceId
          if (videoInputDevices.length >= 1) {
            videoInputDevices.forEach((element) => {
              const sourceOption = document.createElement('option')
              sourceOption.text = element.label
              sourceOption.value = element.deviceId
              sourceSelect.appendChild(sourceOption)
            })

            sourceSelect.onchange = () => {
              selectedDeviceId = sourceSelect.value;
            };

            const sourceSelectPanel = document.getElementById('sourceSelectPanel')
            sourceSelectPanel.style.display = 'block'
          }

          document.getElementById('startButton').addEventListener('click', () => {
            codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
              if (result) {
                console.log(result)
                document.getElementById("result").textContent = result.text
                const audio = new Audio('Audio/beep.mp3');
                audio.play();

                var toko_id = document.getElementById("result").innerHTML; // find <code> tag and get text
                
                $.ajax({
                  type:"get",
                  url:"findToko",
                  data:"tk_id="+toko_id,
                    success:function(data){
                      console.log(toko_id);
                      for(var i=0;i<data.length;i++){
                        document.getElementById("nama_toko1").value = data[i].nama_toko;
                        document.getElementById("longitude1").value = data[i].longitude;
                        document.getElementById("latitude1").value = data[i].latitude;
                        document.getElementById("accuracy1").value = data[i].accuracy;
                      }
                    }
                  });
                  codeReader.reset();
                  getLocation();
                  
              }
              if (err && !(err instanceof ZXing.NotFoundException)) {
                console.error(err)
                document.getElementById('result').textContent = err
              }
            })
            console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
          })
          
          document.getElementById('resetButton').addEventListener('click', () => {
            codeReader.reset()
            document.getElementById('result').textContent = '';
            console.log('Reset.')
          })

        })
        .catch((err) => {
          console.error(err)
        })
    })
  </script>

  
@endsection