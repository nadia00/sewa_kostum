<!DOCTYPE html>
<html>
    <title>Pesan</title>
    <body>
        <input value=$id_kostum>

            <form method="POST" action="{{ route('pesan.submit') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Jumlah sewa:</label>
                    <input type="text" class="form-control" placeholder="Enter username" name="jumlah_sewa">
                </div>
                <div class="form-group">
                    <label>Tanggal pakai:</label>
                    <input type="date" class="form-control" placeholder="Enter username" name="tgl_pakai">
                </div>
                <div class="form-group">
                    <label>Tanggal harus kembali:</label>
                    <input type="date" class="form-control" placeholder="Enter username" name="tgl_harus_kembali">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>

    </body>
</html>