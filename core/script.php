<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    function submitPesan(action) {
        $(document).ready(function(){
            var data = {
                action: action,
                kode_transaksi_pembeli: $("#kd_transaksi").val(),
                kode_barang: $("#kd_brg").val(),
                qty_total: $("#qty").val(),
                harga_total: $("#total").val(),
                tgl_transaksi: $("#tgl_transaksi").val(), // Fixed missing '#' for ID selector
                nim: $("#nim").val(), // Fixed missing '#' for ID selector
            };

            $.ajax({
                type: 'post',
                url: '../core/functions.php',
                data: data,
                success: function(response) {
                    alert("Response: " + response);
                }
            });
        });
    }

    $(document).ready(function(){
        getDtBarang();
    });

    function getDtBarang(){
        $.ajax({
            url: '../core/table.php',
            type: 'GET',
            success: function(data){
                $('#live_data').html(data);
            },
            error: function(){
                alert('Failed to fetch data.');
            }
        });
    }

    function insertBarang(){
        var dataBrg = {
                action: action,
                kode_barang: $("#kd_brg").val(),
                kode_supplier: $("#kd_supplier").val(),
                nama_brg: $("#namaBrg").val(),
                qty_total: $("#qty").val(),
                harga_total: $("#total").val(),
                tgl_transaksi: $("#tgl_transaksi").val(), 
            };

            $.ajax({
                type: 'post',
                url: '../core/functions.php',
                data: dataBrg,
                success: function(response) {
                    alert("Response: " + response);
                }
            });
    }
</script>