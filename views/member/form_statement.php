<style type="text/css">
    .form-check{
                display:inline-block; 
                position:relative; 
                width:17px; 
                height:17px;
                }
    input.untukInput1 {
                      border-bottom: 2px solid ;
                      border-left:none;
                      border-right:none;
                      border-top:none;
                      outline: none;
                  }
</style>

<script type="text/javascript">
          function grand_total()
            {
                
                var harga = parseFloat(document.getElementById("i_harga").value);
                var qty = parseFloat(document.getElementById("i_qty").value);
                
                    
                var total = harga * qty;
                
                
                
                document.getElementById("i_total").value = total;
                
            }

           </script>
<!-- Content Header (Page header) -->
        

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          <div class="title_page"> <?= $title ?></div>
                             <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body" style="background-color: #fff;">
                                    
                                    
                                        <div class="col-md-12"  style="background-color: #fff;">
                                                <div class="form-group">
                                                     <div>
                                                        <input class="untukInput1" type="text" size="125" placeholder="Nama " name="$i_name" value="<?= $row->member_name ?>" />
                                                    </div>
                                                    <br>
                                                    <div>
                                                        <input class="untukInput1" type="text" size="125" placeholder="Email" name="$i_email" value="<?= $row->member_email ?>" />
                                                    </div>
                                                    <br>
                                                    <div>
                                                        <input class="untukInput1" type="text" size="125" placeholder="Phone" name="$i_phone" value="<?= $row->member_phone ?>" />
                                                    </div>
                                                    <br>
                                                    <div>
                                                        <input class="untukInput1" type="text" size="125" placeholder="Alamat" name="$i_alamat" value="<?= $row->member_alamat ?>" />
                                                    </div><br>
                                                </div>

                                                <div class="form-group">
                                                    <div>
                                                        <label>Apakah anda mempunyai atau pernah mempunyai masalah tekanan darah tinggi ?</label>
                                                        <div id="tekanan">
                                                            <input type="checkbox" id="tekanan_on" name="tekanan_on" class="form-check"  style="margin-left: 36.2%"/> Ya
                                                            <input type="checkbox" id="tekanan_off" name="tekanan_off" class="form-check" style="margin-left:3.7%"/> Tidak    
                                                        </div>
                                                    </div>
                                                    <div id="asma">
                                                        <label>Apakah anda menderita asma?</label>
                                                        <div>
                                                            <input type="checkbox" id="asma_on" name="asma_on" class="form-check"  style="margin-left: 66%"/> Ya
                                                            <input type="checkbox" id="asma_off" name="asma_off" class="form-check" style="margin-left:3.7%"/> Tidak                              
                                                        </div>
                                                    </div>
                                                    <div id="inhaler">
                                                        <label>Jika ya, apakah anda perlu menggunakan inhaler saat perawatan berlangsung?</label>
                                                        <div>
                                                            <input type="checkbox" id="inhaler_on" name="inhaler_on" class="form-check"  style="margin-left: 36.8%"/> Ya
                                                            <input type="checkbox" id="inhaler_off" name="inhaler_off" class="form-check" style="margin-left:3.7%"/> Tidak
                                                        </div>
                                                    </div>
                                                     <div id="leher">
                                                        <label>Apakah anda sedang mengalami masalah leher dan punggung?</label>
                                                        <div>
                                                            <input type="checkbox" id="leher_on" name="leher_on" class="form-check"  style="margin-left: 46.2%"/> Ya
                                                            <input type="checkbox" id="leher_off" name="leher_off" class="form-check" style="margin-left:3.7%"/> Tidak
                                                        </div>
                                                    </div>
                                                     <div id="kulit">
                                                        <label>Apakah anda sedang memiliki masalah kulit, luka, cedera, atau infeksi?</label>
                                                        <input type="checkbox" id="kulit_on" name="kulit_on" class="form-check"  style="margin-left: 41.5%"/> Ya
                                                        <input type="checkbox" id="kulit_off" name="kulit_off" class="form-check" style="margin-left:3.7%"/> Tidak
                                                    </div>
                                                    <div>
                                                        <input class="untukInput1" type="text" size="125" placeholder="Jika ya, Tolong Jabarkan" name="Input"/>
                                                    </div>
                                                    <br>
                                                    <div id="selain">
                                                        <label>Apakah anda memiliki masalah kesehatan selain yang telah disebutkan di atas dan perlu terapis anda ketahui?</label>
                                                        <input type="checkbox" id="selain_on" name="selain_on" class="form-check"  style="margin-left: 18%"/> Ya
                                                        <input type="checkbox" id="selain_off" name="selain_off" class="form-check" style="margin-left:3.7%"/> Tidak
                                                    </div>
                                                    <div>
                                                        <input class="untukInput1" type="text" size="125" placeholder="Jika ya, Tolong Jabarkan" name="Input"/>
                                                    </div>
                                                    <br>
                                                    <div id="alergi">
                                                        <label>Apakah anda memiliki alergi atau bahan-bahan tertentu yang dapat bereaksi terhadap kulit anda?</label>
                                                        <input type="checkbox" id="alergi_on" name="alrgi_on" class="form-check"  style="margin-left: 26%"/> Ya
                                                        <input type="checkbox" id="alergi_off" name="alrgi_off" class="form-check" style="margin-left:3.7%"/> Tidak
                                                    </div>
                                                    <div>
                                                        <input class="untukInput1" type="text" size="125" placeholder="Jika ya, Tolong Jabarkan" name="Input"/>
                                                    </div>
                                                    <br>
                                                    <div id="hamil">
                                                        <label>Apakah anda sedang hamil atau sedang merencanakan kehamilan?</label>
                                                        <input type="checkbox" id="hamil_on" name="hamil_on" class="form-check"  style="margin-left: 44%"/> Ya
                                                        <input type="checkbox" id="hamil_off" name="hamil_off" class="form-check" style="margin-left:3.7%"/> Tidak
                                                    </div>
                                                    <div>
                                                        <input class="untukInput1" type="text" size="125" placeholder="Jika ya, Berapa usia kandungan anda ?" name="Input"/>
                                                    </div>
                                                    <br>
                                                    <div id="lens">
                                                        <label>Apakah anda menggunakan kontak lens?</label>
                                                        <input type="checkbox" id="lens_on" name="lens_on" class="form-check"  style="margin-left: 59.8%"/> Ya
                                                        <input type="checkbox" id="lens_off" name="lens_off" class="form-check" style="margin-left:3.7%"/> Tidak
                                                    </div>
                                                    <div id="melepasnya">
                                                        <label>Jika ya, apakah anda perlu melepasnya sebelum perawatan wajah atau perawatan lainnya?</label>
                                                        <input type="checkbox" id="melepasnya_on" name="melepasnya_on" class="form-check"  style="margin-left: 30.3%"/> Ya
                                                        <input type="checkbox" id="melepasnya_off" name="melepasnya_off" class="form-check" style="margin-left:3.7%"/> Tidak
                                                    </div>
                                                    <div id=>
                                                        <label>Bagaimana level tekanan pijatan yang anda inginkan saat perawatan?</label>
                                                        <input type="checkbox" id="pijatan_1" name="hobi1" class="form-check check_2" style="margin-left: 35.5%" /> Lembut 
                                                        <input type="checkbox" name="pijatan_3" class="form-check check_2" style="margin-left:1%"/> Sedang
                                                        <input type="checkbox" name="pijatan_4" class="form-check check_2" style="margin-left:1%"/> Kuat
                                                        
                                                    </div>
                                                    <div id="spesial">
                                                        <label>Apakah anda ingin mendapatkan penawaran spesial kami melalui email atau pesan SMS/WA?</label>
                                                         <input type="checkbox" id="spesial_on" name="spesial_on" class="form-check" style="margin-left: 29%"/> Ya
                                                        <input type="checkbox" id="spesial_off" name="spesial_off" class="form-check" style="margin-left:3.7%"/> Tidak
                                                    </div>
                                                    <div id="jawaban">
                                                        <label>Saya menyatakan bahwa jawaban yang berikan adalah benar</label>
                                                         <input type="checkbox" id="jawaban_on" name="jawaban_on" class="form-check" style="margin-left: 48.5%"/> Ya
                                                        <input type="checkbox" id="jawaban_off" name="jawaban_off" class="form-check" style="margin-left:3.5%"/> Tidak
                                                    </div>
                                                     <div id="menyembunyikan">
                                                        <label>Saya tidak menyembunyikan informasi apapun yang mungkin relevan untuk menentukan bagaimana perawatan saya dilakukan</label>
                                                         <input type="checkbox" id="menyembunyikan_on" name="menyembunyikan_on" class="form-check" style="margin-left: 9.3%"/> Ya
                                                        <input type="checkbox" id="menyembunyikan_off" name="menyembunyikan_off" class="form-check" style="margin-left:3.5%"/> Tidak
                                                    </div>
                                                </div> 
                                            </div>
                                        
                                       
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                  <div class="box-footer"  style="background-color: #fff;">
                                <input class="btn btn-warning" type="submit" value="Save"/>
                                <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>
                             
                             </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.form-check').click(function(){
            var elem_check_id = $(this).attr('id');
            // if ($('#'+elem_check_id).prop('checked', true)) {
                var elem = elem_check_id.split("_");
                if (elem[1] == "on") {
                    var elem_uncheck = '#'+elem[0]+'_off';
                } else {
                    var elem_uncheck = '#'+elem[0]+'_on';
                }
                $(elem_uncheck).prop('checked', false);
            // }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.form-check check_2').click(function(){
            var elem_check_id = $(this).attr('id');
            // if ($('#'+elem_check_id).prop('checked', true)) {
                var elem = elem_check_id .split("_");
                if (elem[1] == "pijatan_1") {
                    var elem_uncheck = '#'+elem[0]+'_2';
                } else {
                    var elem_uncheck = '#'+elem[0]+'_3';
                }  
                $(elem_uncheck).prop('checked', false);
            // }
        });
    });
</script>

