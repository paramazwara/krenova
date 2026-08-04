<div style="width: 200px; height: 100px; margin: 10px; padding: 10px">
    <div class="card">
            <div class="basic-form">
                <form method="POST" action="{{ URL('config/TahunAdd') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nama">Tahun</label>
                    <input type="text" id="tahun" name="tahun" placeholder="Ketik Tahun" maxlength="4" minlength="2" class="@error('tahun') is-invalid @enderror">

                    @error('tahun')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div><br/>
                <div style="text-align: right;">
                    <a href="{{ url('/') }}/home">Kembali</a> | <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

            </div>
    </div>
</div>
