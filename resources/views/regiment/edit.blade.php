@extends('layouts.main')
@push('scripts')
    <script src="{{ asset('build/js/jquery.repeater.js') }}"></script>
@endpush
@section('content')
    {{-- @include('sweetalert::alert') --}}
    <div class="x_panel">
        <div class="x_title">
            <h2> تعديل بيانات الفوج
                {{-- <small> </small> --}}
            </h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form class="form repeater-default" method="POST" action="{{ route('regiment.update', $item->id) }}">
                @csrf
                @method('put')
                <div class="form-group row" style="margin-bottom: 10px">
                    <div class="col-md-10">
                        <label class="control-label " for="name"> رقم الفوج
                        </label>
                        <input type="text" disabled class="form-control col-md-7 col-xs-12" value="{{ $item->id }}">
                    </div>
                </div>

                <div data-repeater-list="list_bennficiary">
                    @foreach ($bennficiaries as $bennficiary)
                        <div data-repeater-item>
                            <div class="row justify-content-between">

                                {{-- {{ dd($bennficiaries) }} --}}
                                <div class="form-group">

                                    <div class="col-md-5" style="margin-bottom:10px">
                                        <label class="control-label " for="airline_name"> المستفيد
                                        </label>
                                        <select name="bennficiary" required class="  form-control col-md-7 col-xs-12">
                                            <option value="">اختر المستفيد</option>
                                            @foreach ($process as $proces)
                                                <option {{ $proces->id == $bennficiary->process->id ? 'selected' : '' }}
                                                    value="{{ $proces->id }}">{{ $proces->beneficiary }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-1 form-group" style="margin-top:13px">
                                    <button class="btn btn-danger" data-repeater-delete type="button"> <i
                                            class="bx bx-x"></i>
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>

                            </div>
                            <hr>
                        </div>
                    @endforeach

                    <div data-repeater-item>
                        <div class="row justify-content-between">

                            {{-- {{ dd($bennficiaries) }} --}}
                            <div class="form-group">

                                <div class="col-md-5" style="margin-bottom:10px">
                                    <label class="control-label " for="airline_name"> المستفيد
                                    </label>
                                    <select name="bennficiary" class="  form-control col-md-7 col-xs-12">
                                        <option value="">اختر المستفيد</option>
                                        @foreach ($process as $proces)
                                            <option value="{{ $proces->id }}">{{ $proces->beneficiary }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-1 form-group" style="margin-top:13px">
                                <button class="btn btn-danger" data-repeater-delete type="button"> <i class="bx bx-x"></i>
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>

                        </div>
                        <hr>
                    </div>

                </div>

                <div class="form-group">
                    <div class="col p-0">
                        <button class="btn btn-secondary" data-repeater-create type="button"><i class="bx bx-plus"></i>
                            اضافة مستفيد جديد
                        </button>
                    </div>
                </div>

                <div class="row justify-content-between">

                    <div class="form-group">

                        <div class="col-md-5" style="margin-bottom:10px">
                            <label class="control-label " for="num_day"> عدد الايام
                                <span class="required">*</span>
                            </label>
                            <input type="text" name="num_day" value="{{ $item->num_day }}" id="num_day"
                                required="required" class="form-control col-md-7 col-xs-12" value="">
                        </div>

                        <div class="col-md-5" style="margin-bottom:10px">
                            <label class="control-label " for="hotel_cost"> تكلفة الفندق
                                <span class="required">*</span>
                            </label>
                            <input type="text" name="hotel_cost" value="{{ $item->hotel_cost }}" id="hotel_cost"
                                required="required" class="form-control col-md-7 col-xs-12" value="">
                        </div>

                        <div class="col-md-5" style="margin-bottom:10px">
                            <label class="control-label " for="relay_cost"> تكلفة الترحيل
                                <span class="required">*</span>
                            </label>
                            <input type="text" name="relay_cost" value="{{ $item->relay_cost }}" id="relay_cost"
                                required="required" class="form-control col-md-7 col-xs-12" value="">
                        </div>

                        <div class="col-md-5" style="margin-bottom:10px">
                            <label class="control-label " for="airline_name"> شركة الطيران
                            </label>
                            <select name="airline_name" class="form-control col-md-7 col-xs-12">
                                <option value="">اختر شركة الطيران</option>
                                @foreach ($companies as $company)
                                    <option {{ $item->airline_name == $company->id ? 'selected' : '' }}
                                        value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-5" style="margin-bottom:10px">
                            <label class="control-label " for="airline_cost"> تكلفة الطيران
                            </label>
                            <input type="text" name="airline_cost" value="{{ $item->airline_cost }}"
                                id="airline_cost" class="form-control col-md-7 col-xs-12" value="">
                        </div>
                        {{-- {{ dd($item->daily->Creditor) }} --}}

                        <div class="col-md-5" style="margin-bottom:10px">
                            <label class="control-label " for="airline_name"> خصم من
                            </label>
                            <select name="tree4_code" required class="form-control col-md-7 col-xs-12">
                                <option value="">اختر الحساب</option>
                                @foreach ($trees as $tree)
                                    <option {{ $item->daily->Creditor == $tree->tree4_code ? 'selected' : '' }}
                                        value="{{ $tree->tree4_code }}">{{ $tree->tree4_name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        {{-- <button type="submit" class="btn btn-primary">انصراف</button> --}}
                        <button type="submit" id="Swal" class="btn btn-success btn-block">تعديل</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
