@extends('vendor.layouts.master')
@section('content')
    <!--=============================
    DASHBOARD START
  ==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <a href="{{route('vendor.products.index')}}" class="btn btn-warning mb-4"><i class="fas fa-long-arrow-left" aria-hidden="true"></i> Back</a>
                        <h3><i class="far fa-user"></i> Products</h3>
                        <div class="card-header d-flex justify-content-between">
                            <h4>Product: {{$product->name}}</h4>
                            <div class="create_button">
                                <a href="{{route('vendor.products-variant.create', ['productId' => $product->id])}}" class="btn btn-primary"><i class="fas fa-plus"></i> Create Product</a>
                            </div>
                        </div>

                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                {{ $dataTable->table() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
      DASHBOARD START
    ==============================-->
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function(){
            $('body').on('click', '.change-status', function(){
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{route('vendor.products-variant.change-status')}}",
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id
                    },
                    success: function(data){
                        toastr.success(data.message)
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                })

            })
        })
    </script>
@endpush
