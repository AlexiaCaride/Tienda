@extends('layouts.master')
@section('titulo')
    Ver
@endsection
@section('corpo')
    @foreach ($camisetas as $camiseta)
        @if ($loop->first)
            <div class="d-flex flex-row justify-content-center alig-items-center">
                <div class="container tarjeta mt-5">
                    <div class="col-12">
                        <div class="row my-2">
                            <div class="col-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="col-6 col-sm-12 col-lg-6">
                                <div class="text-center mt-5">
                                    <img src="{{ URL::asset('imagenes/' . $camiseta->imagen . '/' . $camiseta->color . '.jpg') }}"
                                        class="img-fluid img-thumbnail" style="width: 350px">
                                    <p class="fs-3 fw-bold mx-5 px-5 mt-2">{{ $camiseta->precio }}€</p>
                                </div>
                            </div>
            @endif
        @endforeach
    <div class="col-6 col-sm-12 col-lg-6">
        <div class="d-flex row justify-content-center mt-2 mb-2 mx-5">
            @foreach ($camisetas as $camiseta)
                <form method="post" action="/tienda/camisetas/{{ $camiseta->imagen }}">
            @endforeach
            @csrf
            <div class="my-4">
                <br>
                <h2 class="text-primary">{{ $camiseta->imagen }}</h2>
                <label for="talla" class="fs-4">{{ __('Size')}}</label>
                <select class="form-select" name="talla" id="talla">
                    <option value="seleccionar" disabled>{{ __('Select') }}</option>
                    @php
                        $talla = '';
                    @endphp
                    @foreach ($camisetas as $camiseta)
                        @if ($camiseta->talla != $talla)
                            @php
                                $talla = $camiseta->talla;
                            @endphp
                            <option value="{{ $camiseta->talla }}">{{ $camiseta->talla }}</option>
                        @endif
                    @endforeach
                </select>
                <a href="">
                    <p class="text-center">¿Dudas con la talla?<p>
                </a>
                <label for="color" class="mt-3 fs-4">Color</label>
                <select class="form-select mb-3" name="color" id="color">
                    <option value="seleccionar" disabled>{{ __('Select') }}</option>
                    @foreach ($camisetas as $camiseta)
                        <option value="{{ $camiseta->color }}">{{ $camiseta->color }}</option>
                    @endforeach
                </select>
            </div>
            <div class="justify-content-center text-center mt-5">
                @foreach ($camisetas as $camiseta)
                    <input type="hidden" name="id" id="id" value="{{ $camiseta->producto_id }}">
                @endforeach
                <input class="btn text-white rounded-pill px-4 py-2 bg-primary text-uppercase fs-5" type="submit"
                    name="anadir" value="{{ __('Add to cart') }}">
                @if (!empty(session()->has('error')))
                    <div class="alert alert-danger mt-2">
                        {{ session()->get('error') }}
                    </div>
                @endif
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
