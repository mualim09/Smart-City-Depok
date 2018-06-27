
                  <div class="col-md-4 no-padding">
                    <strong>Informasi detail grafik:</strong>
                  </div>
                  <div class="col-md-4 right-side-information-grafik">
                   <div class="col-xs-6">
                      <strong class="second-leading">Average Sentiment</strong>
                    @if($total_positif>$total_negatif)
                      <p style="font-size: 30px;margin-top: 6px;">{{ round(($total_positif/($total_positif + $total_netral + $total_negatif)*100) , 2)}} %</p>
                    </div>
                    <div class="col-xs-6" style="text-align: right;padding-top: 10px">
                      <i class="fa fa-smile-o fa-4x" style="color: #1ba1ed"></i>
                    </div>
                    @elseif($total_positif<$total_negatif)
                      <p style="font-size: 30px;margin-top: 6px;">{{ round(($total_negatif/($total_positif + $total_netral + $total_negatif)*100) , 2)}} %</p>
                    </div>
                    <div class="col-xs-6" style="text-align: right;padding-top: 10px">
                      <i class="fa fa-frown-o fa-4x" style="color: #fd79a8"></i>
                    </div>
                    @endif
                  </div>
                  <div class="col-md-4 right-side-information-grafik" style="padding:10px 25px 10px 20px">
                    <strong style="font-size: 16px;margin-bottom: 5px">Sentiment Analysis</strong>
                    <div class="row">
                      <div class="col-xs-6">
                        Total Tweet
                      </div>
                      <div class="col-xs-6 text-right">
                      {{$total_positif + $total_netral + $total_negatif }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-6">
                      <span style="color: green">Total Positif</span>
                      </div>
                      <div class="col-xs-6 text-right">
                        {{$total_positif}}
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-xs-6">
                      <span style="color: #fc6">Total Netral</span>
                      </div>
                      <div class="col-xs-6 text-right">
                        {{$total_netral}}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-6">
                      <span style="color: red">Total Negatif</span>
                      </div>
                      <div class="col-xs-6 text-right">
                        {{$total_negatif}}
                      </div>
                    </div>
                  </div>