<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    function submitPesan(action) {
        $(document).ready(function() {
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

    function insertPesan(action, data) {
        $.ajax({
            type: 'post',
            url: '../core/functions.php',
            data: {
                action: action,
                kode_transaksi_pembeli: data.get('kode_transaksi_pembeli'),
                kode_barang: data.get('kode_barang'),
                qty_total: data.get('qty'),
                harga_total: data.get('harga_item'),
                tgl_transaksi: data.get('tgl_transaksi'),
                nim: data.get('nim'),
            },
            success: function(response) {
                alert("Response: " + response);
            }
        });
    }

    async function selectTable(query) {
        var returnJson;
        return await $.ajax({
            type: 'post',
            url: '../core/functions.php',
            data: {
                action: 'select',
                query: query,
            },
            dataType: 'json',
            success: function(response) {
                returnJson = response;
                return response;
            }
        });
    }
</script>