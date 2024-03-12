@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Subcategory {{ $subcategory->id }}</h3>
                    
                        <a class="btn btn-success pull-right" href="{{ url('/subcategory/subcategory') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $subcategory->id }}</td>
                            </tr>
                            <tr><th> Category </th><td> {{ $subcategory->category }} </td></tr><tr><th> Subcategory </th><td> {{ $subcategory->subcategory }} </td></tr><tr><th> Image </th><td> {{ $subcategory->image }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.admin.footer')
</div>
@endsection

