(function($) {

    function SippKlingCharts(){

    }

    $.fn.SippKlingCharts = function( options ) {
        var self = this;

        // Establish our default settings
        var settings = $.extend({
            type         : 'bar',
            chartData    : null,
            titleText    : null,
            ketId        : null
        }, options);

        this.each( function() {
            
            var ctx = $(this)[0].getContext("2d");

            window.myBar = new Chart(ctx, {
                  type: settings.type,
                  data: settings.chartData,
                  options: {
                    responsive: true,
                    legend: {
                      position: 'top',
                    },
                    title: {
                      display: true,
                      text: settings.titleText
                    }
                  }
            });

            var total = 0;
            for (var i = settings.chartData.datasets.length - 1; i >= 0; i--) 
                
            {
                
                for (var j = settings.chartData.datasets[i].data.length - 1; j >= 0; j--) 

                {

                        total += settings.chartData.datasets[i].data[j];
                
                }

            }



            // fill dom
            $('#' + settings.ketId).find('.box-keterangan .progress-number b').html(total);
            
            for (var i = 0; i < settings.chartData.labels.length; i++) {

                var values = "";
 
                for (var j = 0; j < settings.chartData.datasets.length; j++) {

                    values += "<small class='label pull-right label-data-chart' style='background-color: "+settings.chartData.datasets[j].borderColor+"'>"+settings.chartData.datasets[j].data[i]+"</small>";
                
                }

                
                $('#' + settings.ketId).find('.box-detail-keterangan .progress-group').append(
                    "<div class='col-xs-12 no-padding overflow-hidden'>"+
                    "<span class='progress-text'>"+settings.chartData.labels[i]+"</span>"+
                    "<div class='pull-right detail-implicit'>"+
                    values
                    +
                    "</div>"+
                    "</div>"
                );

            };

        });
        
    }

}(jQuery));