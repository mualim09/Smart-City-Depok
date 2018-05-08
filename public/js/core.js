(function($){
    function SippKling(mainDashboardMenu, filterKecamatan, filterKelurahan, filterRw, pendataan, perbandingan, perbandinganKelurahan){
        var self = this;

        this.base_url = base_url;
        this.mainDashboardMenu = mainDashboardMenu;
        this.filterKecamatan = filterKecamatan;
        this.filterKelurahan = filterKelurahan;
        this.filterRw = filterRw;
        this.pendataan = pendataan;
        this.perbandingan = perbandingan;
        this.perbandinganKelurahan = perbandinganKelurahan;

        $(self.perbandingan).change(function(){

            if($(this).val() == 2){

                self.openFilterPerbandinganKelurahanInKecamatan();

            } else if($(this).val() == 0){

                $(self.perbandinganKelurahan).prop(
                    { 
                        'selectedIndex' : 0,
                        'disabled' : true
                    }
                );


            } else {


            }

        });

        $(self.mainDashboardMenu).change(function(){
        
            window.location = $(this).val();
        
        });

        $(self.pendataan).change(function(){
        
            window.location = $(this).val();
        
        });

        $(self.filterKecamatan).change(function(){
            var value = $(this).val();
            
            $('[data-filter="delete-generate"]').remove();

            if(value == 0)
            {
                self.setDefaultKelurahan();

            } else {
                $.ajax({
                    url: base_url + '/sipp-kling-data-kelurahan',
                    type: 'GET',
                    dataType: 'json',
                    data: {'kecamatan': value},
                    success: function(result){
                        self.addDataKelurahanIntoOption(result);
                    }
                    }).done(function(){
                        self.openFilterKelurahan($(this).attr('class'), $(this).attr('id'));
                    }).fail(function() {
                        alert( "error 403" );
                        // abort_404();
                    });
            }
        });
    }

    SippKling.prototype.addDataKelurahanIntoOption = function(args) {
        this.filterKelurahan.find('option[data-core="this"]').remove();
        for (var i = 0; i < args.length; i++) {
            $(this.filterKelurahan).append('<option data-core="this" value='+ args[i].kelurahan +'>'+ args[i].kelurahan +'</option>');
        }
    };

    SippKling.prototype.openFilterPerbandinganKelurahanInKecamatan = function() {
        $(this.perbandinganKelurahan).prop("disabled", false);
    };

    SippKling.prototype.openFilterKelurahan = function(param_class, param_id) {
        var self = this;

        $(this.filterKelurahan).prop("disabled", false);
        $('#remove-this-stuff').attr('name', 'disable-kelurahan');
    };

    SippKling.prototype.setDefaultKelurahan = function() {
    
        $(this.filterKelurahan).prop(
            {
                'selectedIndex': 0,
                'disabled' : true
            }
        );
        $('#remove-this-stuff').attr('name', 'kelurahan');
        this.filterKelurahan.find('option[data-core="this"]').remove();

    };

    SippKling.prototype.resetForm = function() {
        var allSelect = 'select';

        $(allSelect).prop(
            {
                'selectedIndex': 0,
                'disabled' : true
            }
        );
    };
	

    $.fn.SippKling = function(config){
        var options = {
            mainDashboardMenu        : '#change-dashboard',
            filterKecamatan          : '#filter-kecamatan',
            filterKelurahan          : '#filter-kelurahan',
            filterRw                 : '#filter-rw',
            pendataan                : '#pendataan',
            perbandingan             : '#perbandingan',
            perbandinganKelurahan    : '#perbandingan-kelurahan-di-kecamatan'
        }


        $.extend(options, config);

        new SippKling($(options.mainDashboardMenu), $(options.filterKecamatan), $(options.filterKelurahan), $(options.filterRw), $(options.pendataan), $(options.perbandingan), $(options.perbandinganKelurahan));
        
        return this;
    }

}(jQuery))