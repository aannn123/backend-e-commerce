@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Barang</h4>
                    </div> 
                    <div class="card-body">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)                                        
                                    <tr>
                                        <td>{{$number++}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->type}}</td>
                                        <td><small>Rp. </small>{{number_format($item->price,0,'.','.')}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>
                                            <a href="{{route('products.gallery', $item->id)}}" class="btn btn-info btn-sn">
                                                <i class="fa fa-picture-o"></i>
                                            </a>
                                            <a href="{{route('products.edit', $item->id)}}" class="btn btn-primary btn-sn">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{route('products.destroy', $item->id)}}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button href="#" class="btn btn-danger btn-sn">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center p-5">
                                            Data tidak tersedia
                                        </td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        <div class="float-right mt-5">
                            {{ $items->links() }}
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
@endsection