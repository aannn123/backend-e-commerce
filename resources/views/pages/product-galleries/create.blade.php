@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Foto Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{route('product-galleries.store')}}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Barang</label>
                    <select name="products_id" class="custom-select @error('products_id') is-invalid @enderror">
                        <option value="">Pilih</option>
                        @foreach ($products as $id => $name)
                            <option value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                    @error('products_id')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
               
               
                <div class="form-group">
                    <label for="photo" class="form-control-label">Foto Barang</label>
                    <input 
                        type="file" 
                        name="photo" 
                        value="{{old('photo')}}" 
                        accept="image/*"
                        required
                        class="form-control @error('photo') is-invalid @enderror">
                        @error('photo')
                            <div class="text-muted">{{$message}}</div>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="is_default" class="form-control-label">Jadikan Default</label>
                    <br>
                    <label>
                        <input 
                            type="radio" 
                            name="is_default" 
                            value="1" 
                            checked
                            class="form-control @error('is_default') is-invalid @enderror"/> Ya
                    </label>
                    {{-- &nbsp; --}}
                    <label>
                        <input 
                            type="radio" 
                            name="is_default" 
                            value="0" 
                            class="form-control @error('is_default') is-invalid @enderror"/> Tidak
                    </label>
                        @error('is_default')
                            <div class="text-muted">{{$message}}</div>
                        @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Tambah Foto Barang
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('after-script')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
            .create( document.querySelector( '.ckeditor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
@endpush