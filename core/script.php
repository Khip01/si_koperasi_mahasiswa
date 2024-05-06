<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    function submitData(action) {
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
</script>