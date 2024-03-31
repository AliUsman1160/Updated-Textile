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
    <div>
        <p class="page-indicate">Fabric/Sale/Add</p>
    </div>

    <form class="custom-form mt-5" action="{{ route('addfabricsale') }}" method="post">
        @csrf

         <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="form-group">
                    <label for="quality">Quality</label>
                    <select class="form-control @error('quality') is-invalid @enderror" id="quality" name="quality">
                        <option value="" selected disabled>Select quality</option>
                        @foreach ($qualities as $q)
                        <option value="{{ $q->quality }}">
                                {{ $q->quality }}
                            </option>
                        @endforeach
                    </select>                        
                    @error('quality')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
       
        <div class="row my-4">            
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <label for="meter">Meter</label>
                    <input type="number" step="any" class="form-control @error('meter') is-invalid @enderror" id="meter" placeholder="20" name="meter" value="{{ old('meter') }}">
                    @error('meter')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <label for="price_per_meter">Price Per Meter</label>
                    <input type="number" step="any" class="form-control @error('price_per_meter') is-invalid @enderror" id="price_per_meter" placeholder="100" name="price_per_meter" value="{{ old('price_per_meter') }}">
                    @error('price_per_meter')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="number" step="any" class="form-control @error('weight') is-invalid @enderror" id="weight" placeholder="20" name="weight" value="{{ old('weight') }}">
                    @error('weight')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <label for="purchaser">Purchaser</label>
                    <select class="form-control" id="purchaser" name="purchaser">
                        <option value="" selected disabled>Select Purchaser</option>
                        @foreach ($purchasers as $purchaser)
                            <option value="{{ $purchaser->name }}" {{ old('purchaser') == $purchaser->name ? 'selected' : '' }}>
                                {{ $purchaser->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('purchaser')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row my-4">
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <label for="total_price">Total Price</label>
                    <input type="number" step="any" class="form-control @error('total_price') is-invalid @enderror" id="total_price" placeholder="10,000" name="total_price" value="{{ old('total_price') }}">
                    @error('total_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <label for="received_price">Received Price</label>
                    <input type="number" step="any" class="form-control @error('received_price') is-invalid @enderror" id="received_price" placeholder="10,000" name="received_price" value="0">
                    @error('received_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            {{-- <div class="col-lg-6 col-sm-12 mt-3">
                <label for="paymentStatus">Payment Status</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="paymentStatus" id="receivedRadio" value="received" required>
                        <label class="form-check-label" for="receivedRadio">Received</label>
                    </div>
                    
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="paymentStatus" id="notReceivedRadio" value="notReceived" required>
                        <label class="form-check-label" for="notReceivedRadio">Not Received</label>
                    </div>
                </div>
            </div> --}}
            
        <div class="row mt-3">
            <div class="col-12 d-flex justify-content-center">
                <button type="submit" class="btn main-color">Add Sale Fabric Record</button>
            </div>
        </div>
    </form>

</div>
@endsection

@section('script')
    <script>
        $('#purchaser').select2({
        width: '100%', 
        containerCssClass: 'select2-custom-container', 
        });

        $('#quality').select2({
        width: '100%', 
        containerCssClass: 'select2-custom-container', 
        });
        $('#meter').on('keyup', function () {
                var meter =  $('#meter').val();
                var price_per_meter =  $('#price_per_meter').val();
                if(meter>0 && price_per_meter>0){
                    $('#total_price').val(meter*price_per_meter);
                }else{
                    $('#total_price').val(0);
                }
        });
        $('#price_per_meter').on('keyup', function () {
                var meter =  $('#meter').val();
                var price_per_meter =  $('#price_per_meter').val();
                if(meter>0 && price_per_meter>0){
                    $('#total_price').val(meter*price_per_meter);
                }else{
                    $('#total_price').val(0);
                }
        });

    </script>
@endsection
