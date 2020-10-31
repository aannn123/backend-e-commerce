@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Transaksi Masuk</h4>
                    </div> 
                    <div class="form-group">
                        
                    <div class="card-body">
                        {{-- <div id="test">
                            <div class="form-group">
                                <select class="custom-select" required>
                                    <option  v-for="item in provinsi" :key="item.id" v-model:value="item.name">@{{item.name}}</option>
                                </select>
                              </div>
                        </div> --}}
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nomor</th>
                                        <th>Total Transaksi</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)                                        
                                    <tr>
                                        <td>{{$number++}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->number}}</td>
                                        <td>{{number_format($item->transaction_total,0,'.','.')}}</td>
                                        <td>
                                            @if ($item->transaction_status == 'PENDING')
                                                <span class="badge badge-info">
                                            @elseif ($item->transaction_status == 'SUCCESS')
                                                <span class="badge badge-success">
                                            @elseif ($item->transaction_status == 'FAILED')
                                                <span class="badge badge-danger">
                                            @else
                                                <span>   
                                            @endif
                                                {{$item->transaction_status}}
                                                </span>
                                        </td>
                                        <td class="row">
                                            @if ($item->transaction_status == 'PENDING')
                                                <a class="btn btn-success btn-sm mr-1" href="{{route('transactions.status', $item->id)}}?status=SUCCESS">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                <a class="btn btn-warning btn-sm mr-1" href="{{route('transactions.status', $item->id)}}?status=FAILED">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            @endif
                                            <a 
                                                href="#mymodal"
                                                data-remote={{route('transactions.show', $item->id)}}
                                                data-toggle="modal"
                                                data-target="#mymodal"
                                                data-title="Detail Transaksi {{$item->uuid}}"
                                                class="btn btn-info btn-sm mr-1">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{route('transactions.edit', $item->id)}}" class="btn btn-primary btn-sm mr-1">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{route('transactions.destroy', $item->id)}}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button href="#" class="btn btn-danger btn-sm mr-1">
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
                        <div id="app">

                        {{-- <example-component></example-component/>
                            <main-vue></main-vue> --}}
                        {{-- <div class="float-right mt-5">
                            {{ $items->links() }}
                        </div> --}}
                    </div>
                </div>
            </div> 
        </div>
    </div>
@endsection
@push('after-script')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        new Vue({
            el: '#test',
            data: {
                message: 'Hello Vue!',
                provinsi: []
            },
            mounted() {
                axios
                    .get("https://x.rajaapi.com/MeP7c5nea5YCRqz1QLfgWhCEdvANrhbE2X5UhBBDEjtdzNIH1KCJIDxV6j/m/wilayah/provinsi")
                    .then(res => (this.provinsi = res.data.data))
                    .catch(err => console.log(err))
                    },
        })
    </script>
@endpush