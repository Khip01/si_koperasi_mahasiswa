<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    function submitPesan(action) {
        $(document).ready(function() {
            var data = {
                action: 'insertPesan',
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

    async function insertPesan(data) {
        return await $.ajax({
            type: 'post',
            url: '../core/functions.php',
            data: {
                action: 'insertPesan',
                kode_transaksi_pembeli: data.get('kode_transaksi_pembeli'),
                kode_barang: data.get('kode_barang'),
                qty_total: data.get('qty'),
                harga_total: data.get('harga_item'),
                tgl_transaksi: data.get('tgl_transaksi'),
                nim: data.get('nim'),
            },
            success: function(response) {
                console.log("Response: " + response);
            }
        });
    }

    async function selectTable(query) {
        return await $.ajax({
            type: 'post',
            url: '../core/functions.php',
            data: {
                action: 'select',
                query: query,
            },
            dataType: 'json',
            success: function(response) {
                return response;
            }
        });
    }

    async function pembeliMaxKd() {
        return await $.ajax({
            type: 'post',
            url: '../core/functions.php',
            data: {
                action: 'pembeliMaxKd',
            },
            success: function(response) {
                return response;
            }
        });
    }

    async function supplierMaxKd() {
        return await $.ajax({
            type: 'post',
            url: '../core/functions.php',
            data: {
                action: 'supplierMaxKd',
            },
            success: function(response) {
                return response;
            }
        });
    }

    async function insert(target, data) {
        let data_arg = `INSERT INTO ${target} (`;
        let header = Array.from(data.keys());
        for (let index = 0; index < header.length; index++) {
            data_arg += header[index];
            if (index != header.length - 1) {
                data_arg += `, `;
            } else {
                data_arg += `) VALUES (`;
            }
        }
        for (let i = 0; i < data.size; i++) {
            const value = data.get(Array.from(data.keys())[i]);
            data_arg += `'${value}'`;
            if (i != data.size - 1) {
                data_arg += `, `;
            } else {
                data_arg += `);`;
            }
        }
        console.log(`ARG: ${data_arg}`);

        return await $.ajax({
            type: 'post',
            url: '../core/functions.php',
            data: {
                action: 'query',
                data: data_arg
            },
            success: function(response) {
                console.log("Response: " + response);
            }
        });
    }

    async function update(target, where, where_data, header, data) {
        let data_arg = `UPDATE ${target} SET ${header} = '${data}' WHERE ${where} = '${where_data}';`;
        
        console.log(`ARG: ${data_arg}`);

        return await $.ajax({
            type: 'post',
            url: '../core/functions.php',
            data: {
                action: 'query',
                data: data_arg
            },
            success: function(response) {
                console.log("Response: " + response);
            }
        });
    }
</script>