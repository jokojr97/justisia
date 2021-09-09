<?php
    $data = array(); 
    foreach ($data_penduduk->result_array() as $row)
    {
    $data[] = $row;
    }
    $sample_data = json_encode($data);
      // echo $sample_data;
            // echo $sql;
        ?>
        <script>
    
        $(function() {
            var jsonData = <?= $sample_data ?>;
            $('#bosdttable').dataTable({
             "processing" : true,
              dom: 'Bfrtip',
              buttons: ['copy', 'excel', 'csv',
                  {
                      extend: 'pdfHtml5',
                      orientation: 'landscape'
                  }
              ],
              "pageLength": 25,
            data: jsonData,
                columns: [
                    { data: 'nomor' },
                    { data: 'no_kk' },
                    { data: 'nik' },
                    { data: 'nama_penduduk' },
                    { data: 'tempat_lahir' },
                    { data: 'tanggal_lahir' },
                    { data: 'umur' },
                    { data: 'jenis_kelamin' },
                    { data: 'pendidikan_terakhir' },
                    { data: 'pekerjaan' },
                    { data: 'status_perkawinan' }
                ], 
              columnDefs : [
              {
                targets : [0],
                render : function (data, type, row) {
                  var btn = "<a href=\"<?= base_url() ?>adminsuper/detail_penduduk/"+data+"\" class=\"btn btn-success btn-round btn-xs\" target=\"_blank\"><span class=\"fas fa-plus\"></span></a>";
                  return btn;
    
                }
              }
              ]
      });
    
      });
    
        </script>
    
