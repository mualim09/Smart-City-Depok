            // pemantauan jentik berkala
            var pjbChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [
                {
                  label: 'YA',
                  backgroundColor: color(window.chartColors.red).alpha(0.9).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['pjby'][0]->total !!} , {!! $rumah_sehat['pjby'][1]->total !!} , {!! $rumah_sehat['pjby'][2]->total !!} , {!! $rumah_sehat['pjby'][3]->total !!}]
                },
                {
                  label: 'TIDAK',
                  backgroundColor: color(window.chartColors.green).alpha(0.9).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['pjbt'][0]->total !!} , {!! $rumah_sehat['pjbt'][1]->total !!} , {!! $rumah_sehat['pjbt'][2]->total !!} , {!! $rumah_sehat['pjbt'][3]->total !!} ]
                }]
            };

            $('#canvaspjb').SippKlingCharts({
                type        : 'bar',
                chartData   : pjbChartData,
                titleText   : 'Data PJB 2017',
                ketId       : 'pjb'
            });


              var jambanChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Kali',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['jambankali'][0]->total !!} , {!! $rumah_sehat['jambankali'][1]->total !!} , {!! $rumah_sehat['jambankali'][2]->total !!} , {!! $rumah_sehat['jambankali'][3]->total !!}  ]
                },
                {
                  label: 'Koya / Empang',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['jambankoya'][0]->total !!} , {!! $rumah_sehat['jambankoya'][1]->total !!} , {!! $rumah_sehat['jambankoya'][2]->total !!} , {!! $rumah_sehat['jambankoya'][3]->total !!}]
                },
                {
                  label: 'Helikopter',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['jambanheli'][0]->total !!} , {!! $rumah_sehat['jambanheli'][1]->total !!} , {!! $rumah_sehat['jambanheli'][2]->total !!} , {!! $rumah_sehat['jambanheli'][3]->total !!} ]
                }, {
                  label: 'Septik Tank',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['jambanseptik'][0]->total !!} , {!! $rumah_sehat['jambanseptik'][1]->total !!} , {!! $rumah_sehat['jambanseptik'][2]->total !!} , {!! $rumah_sehat['jambanseptik'][3]->total !!} ]
                }]
              };

            $('#canvasjamban').SippKlingCharts({
                type        : 'bar',
                chartData   : jambanChartData,
                titleText   : 'Data Jamban 2017',
                ketId       : 'jamban'
            });




            var color = Chart.helpers.color;
              var spalChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Terbuka',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['spaltb'][0]->total !!} , {!! $rumah_sehat['spaltb'][1]->total !!} , {!! $rumah_sehat['spaltb'][2]->total !!} , {!! $rumah_sehat['spaltb'][3]->total !!}]
                }, {
                  label: 'Tertutup',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['spaltt'][0]->total !!} , {!! $rumah_sehat['spaltt'][1]->total !!} , {!! $rumah_sehat['spaltt'][2]->total !!} , {!! $rumah_sehat['spaltt'][3]->total !!}]
                }]
              };

            $('#canvasspal').SippKlingCharts({
                type        : 'bar',
                chartData   : spalChartData,
                titleText   : 'Data SPAL 2017',
                ketId       : 'spal'
            });

//SAMPAH
              var color = Chart.helpers.color;
              var sampahChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Dipilah / Organik',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['tpsor'][0]->total !!} , {!! $rumah_sehat['tpsor'][1]->total !!} , {!! $rumah_sehat['tpsor'][2]->total !!} , {!! $rumah_sehat['tpsor'][3]->total !!}]
                }, {
                  label: 'Tidak Dipilah / Dibuang',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $rumah_sehat['tpsdib'][0]->total !!} , {!! $rumah_sehat['tpsdib'][1]->total !!} ,
                   {!! $rumah_sehat['tpsdib'][2]->total !!} , {!! $rumah_sehat['tpsdib'][3]->total !!}]
                }]
              };

            $('#canvassampah').SippKlingCharts({
                type        : 'bar',
                chartData   : sampahChartData,
                titleText   : 'Data Sampah 2017',
                ketId       : 'sampah'
            });

//PKL
var color = Chart.helpers.color;
              var pklChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Luar Gedung',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $pelayanan_keslings['pklluar'][0]->total !!} , {!! $pelayanan_keslings['pklluar'][1]->total !!} ,
                   {!! $pelayanan_keslings['pklluar'][2]->total !!} , {!! $pelayanan_keslings['pklluar'][3]->total !!}]
                }, {
                  label: 'Dalam Gedung',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $pelayanan_keslings['pkldalam'][0]->total !!} , {!! $pelayanan_keslings['pkldalam'][1]->total !!} , 
                  {!! $pelayanan_keslings['pkldalam'][2]->total !!} , {!! $pelayanan_keslings['pkldalam'][3]->total !!}]
                }]
              };

            $('#canvaspkl').SippKlingCharts({
                type        : 'bar',
                chartData   : pklChartData,
                titleText   : 'Data PKL 2017',
                ketId       : 'pkl'
            });

//////////////////////////////////////////////////////////////////////////////////////////DAM///////////////////////////////////////////////////////
            var color = Chart.helpers.color;
              var damChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Memenuhi Persyaratan',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $dam_sip_klings['depotlayak'][0]->total !!} , {!! $dam_sip_klings['depotlayak'][1]->total !!} , 
                  {!! $dam_sip_klings['depotlayak'][2]->total !!} , {!! $dam_sip_klings['depotlayak'][3]->total !!}]
                }, {
                  label: 'Tidak Memenuhi Persyaratan',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $dam_sip_klings['depottlayak'][0]->total !!} , {!! $dam_sip_klings['depottlayak'][1]->total !!} ,
                   {!! $dam_sip_klings['depottlayak'][2]->total !!} , {!! $dam_sip_klings['depottlayak'][3]->total !!}]
                }]
              };

            $('#canvasdam').SippKlingCharts({
                type        : 'bar',
                chartData   : damChartData,
                titleText   : 'Data DAM 2017',
                ketId       : 'dam'
            });


//============================================================TMr===============================
            var color = Chart.helpers.color;
              var tmrChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Layak',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $kuliners['rmlayak'][0]->total !!} , {!! $kuliners['rmlayak'][1]->total !!} ,
                   {!! $kuliners['rmlayak'][2]->total !!} , {!! $kuliners['rmlayak'][3]->total !!}]
                }, {
                  label: 'Tidak Layak',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $kuliners['rmtlayak'][0]->total !!} , {!! $kuliners['rmtlayak'][1]->total !!} ,
                   {!! $kuliners['rmtlayak'][2]->total !!} , {!! $kuliners['rmtlayak'][3]->total !!} ]
                }]
              };

            $('#canvastmr').SippKlingCharts({
                type        : 'bar',
                chartData   : tmrChartData,
                titleText   : 'Data Kuliner 2017',
                ketId       : 'tmr'
            });


//============================================================JASA BOGA===============================
            var color = Chart.helpers.color;
              var jbChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Layak',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $jasa_bogas['jblayak'][0]->total !!} , {!! $jasa_bogas['jblayak'][1]->total !!} ,
                   {!! $jasa_bogas['jblayak'][2]->total !!} , {!! $jasa_bogas['jblayak'][3]->total !!}]
                }, {
                  label: 'Tidak Layak',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $jasa_bogas['jbtlayak'][0]->total !!} , {!! $jasa_bogas['jbtlayak'][1]->total !!} ,
                   {!! $jasa_bogas['jbtlayak'][2]->total !!} , {!! $jasa_bogas['jbtlayak'][3]->total !!} ]
                }]
              };

            $('#canvasjb').SippKlingCharts({
                type        : 'bar',
                chartData   : jbChartData,
                titleText   : 'Data Kuliner 2017',
                ketId       : 'jb'
            });

//============================================================TMPAT IBADAH===============================
            var color = Chart.helpers.color;
              var ibadahChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Layak',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $tempat_ibadahs['masjidlayak'][0]->total !!} , {!! $tempat_ibadahs['masjidlayak'][1]->total !!} ,
                   {!! $tempat_ibadahs['masjidlayak'][2]->total !!} , {!! $tempat_ibadahs['masjidlayak'][3]->total !!} ]
                }, {
                  label: 'Tidak Layak',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $tempat_ibadahs['masjidtlayak'][0]->total !!} , {!! $tempat_ibadahs['masjidtlayak'][1]->total !!} ,
                   {!! $tempat_ibadahs['masjidtlayak'][2]->total !!} , {!! $tempat_ibadahs['masjidtlayak'][3]->total !!} ]
                }]
              };

            $('#canvasibadah').SippKlingCharts({
                type        : 'bar',
                chartData   : ibadahChartData,
                titleText   : 'Data Tempat Ibadah 2017',
                ketId       : 'ibadah'
            });
//=========================================================================Pasar
            var color = Chart.helpers.color;
              var pasarChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Sehat',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [ {!! $pasars['psrlayak'][0]->total !!} , {!! $pasars['psrlayak'][1]->total !!} ,
                   {!! $pasars['psrlayak'][2]->total !!} , {!! $pasars['psrlayak'][3]->total !!}]
                 },
                 {
                  label: 'Tidak Sehat',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $pasars['psrtlayak'][0]->total !!} , {!! $pasars['psrtlayak'][1]->total !!} ,
                   {!! $pasars['psrtlayak'][2]->total !!} , {!! $pasars['psrtlayak'][3]->total !!}]
                }]
              };

            $('#canvaspasar').SippKlingCharts({
                type        : 'bar',
                chartData   : pasarChartData,
                titleText   : 'Data Pasar 2017',
                ketId       : 'pasar'
            });





            //=========================================================================SEKOLAH
            var color = Chart.helpers.color;
              var sekolahChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [
                {
                  label: 'Sehat',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $sekolahs['sklayak'][0]->total !!} , {!! $sekolahs['sklayak'][1]->total !!} ,
                   {!! $sekolahs['sklayak'][2]->total !!} , {!! $sekolahs['sklayak'][3]->total !!} ]
              },
              {
                  label: 'Tidak Sehat',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $sekolahs['sktlayak'][0]->total !!} , {!! $sekolahs['sktlayak'][1]->total !!} ,
                   {!! $sekolahs['sktlayak'][2]->total !!} , {!! $sekolahs['sktlayak'][3]->total !!}]
               }]
                };

            $('#canvassekolah').SippKlingCharts({
                type        : 'bar',
                chartData   : sekolahChartData,
                titleText   : 'Data Sekolah 2017',
                ketId       : 'sekolah'
            });






            //=========================================================================PESANTREN
            var color = Chart.helpers.color;
              var pesantrenChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Sehat',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $pesantrens['pstlayak'][0]->total !!} , {!! $pesantrens['pstlayak'][1]->total !!} ,
                   {!! $pesantrens['pstlayak'][2]->total !!} , {!! $pesantrens['pstlayak'][3]->total !!} ]
              },
              {
                  label: 'Tidak Sehat',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $pesantrens['psttlayak'][0]->total !!} , {!! $pesantrens['psttlayak'][1]->total !!} ,
                   {!! $pesantrens['psttlayak'][2]->total !!} , {!! $pesantrens['psttlayak'][3]->total !!}]
              }]  
            };

            $('#canvaspesantren').SippKlingCharts({
                type        : 'bar',
                chartData   : pesantrenChartData,
                titleText   : 'Data Pesantren 2017',
                ketId       : 'pesantren'
            });




                        //=========================================================================HOTEL=======================================
            var color = Chart.helpers.color;
              var hotelChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [{
                  label: 'Sehat',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [ {!! $hotels['hlayak'][0]->total !!} , {!! $hotels['hlayak'][1]->total !!} ,
                   {!! $hotels['hlayak'][2]->total !!} , {!! $hotels['hlayak'][3]->total !!}]
                },{
                  label: 'Tidak Sehat',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [{!! $hotels['htlayak'][0]->total !!} , {!! $hotels['htlayak'][1]->total !!} ,
                   {!! $hotels['htlayak'][2]->total !!} , {!! $hotels['htlayak'][3]->total !!} ]
                }]
              };

            $('#canvashotel').SippKlingCharts({
                type        : 'bar',
                chartData   : hotelChartData,
                titleText   : 'Data Hotel 2017',
                ketId       : 'hotel'
            });










                        //=========================================================================HOTEL MELATI=======================================
            var color = Chart.helpers.color;
              var hotelmelatiChartData = {
                labels: ["grogol", "krukut", "limo", "meruyung"],
                datasets: [ {
                  label: 'Sehat',
                  backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                  borderColor: window.chartColors.green,
                  borderWidth: 1,
                  data: [{!! $hotel_melatis['hmlayak'][1]->total !!} , {!! $hotel_melatis['hmlayak'][1]->total !!} ,
                   {!! $hotel_melatis['hmlayak'][1]->total !!} , {!! $hotel_melatis['hmlayak'][1]->total !!} ]
                }, {
                  label: 'Tidak Sehat',
                  backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                  borderColor: window.chartColors.red,
                  borderWidth: 1,
                  data: [ {!! $hotel_melatis['hmtlayak'][1]->total !!} , {!! $hotel_melatis['hmtlayak'][1]->total !!} ,
                   {!! $hotel_melatis['hmtlayak'][1]->total !!} , {!! $hotel_melatis['hmtlayak'][1]->total !!}]
                }]
              };

            $('#canvashotelmelati').SippKlingCharts({
                type        : 'bar',
                chartData   : hotelmelatiChartData,
                titleText   : 'Data Hotel Melati 2017',
                ketId       : 'hotelmelati'
            });
