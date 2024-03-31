@extends('layout.app')
@section('style')
    <style>
         .custom-form {
            border: 2px solid #ddd;
            border-radius: 20px;
            padding: 15px;
            box-shadow: 5px 5px 2px 2px rgb(227, 227, 227);
        }
    </style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center">
        <p class="page-indicate">Yarn/Invontry</p>
    </div>
    
    
    <div class="row my-4">
        <div class="col-md-12">
            <div class="table-responsive ">
                <table class="table table-hover">
                    <thead class="main-color">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Bags</th>
                            <th scope="col">Cones</th>
                            <th scope="col">Count</th>
                            <th scope="col">Type</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Update Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($records as $index => $record)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>
                                <td>{{ $record->bag }}</td>
                                <td>{{ $record->cones }}</td>
                                <td>{{ $record->count }}</td>
                                <td>{{ $record->type }}</td>
                                <td>{{ $record->brand }}</td>
                                <td>{{ $record->updated_at->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                {{ $records->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
</div>
@endsection

@section('script')
   
   
@endsection
