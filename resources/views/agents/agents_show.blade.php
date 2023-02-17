<!DOCTYPE html>
<html lang="fa" dir="rtl">
@include('layouts.head')
<!-- /header content -->
    <body class="login" style="padding: 15px">


        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>اسم الوكيل</td>
                    <td>رقم الهاتف </td>
                    <td>تاريخ التسجيل</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$agent->name}}</td>
                    <td>{{$agent->phone}}</td>
                    <td>{{$agent->created_at}}</td>
                </tr>
            </tbody>


         <table class="table table-bordered">
        <thead>
            <tr>
                <td>المطلوب</td>
                <td>المدفوع</td>
                <td>المتبقي</td>
            </tr>
        </thead>
        <tbody>
            <div style="display: none">
                <?php
                    $Total_debtor=0;
                    $Total_Creditor=0;
                    $paid_up=0;
                ?>

                @foreach ($debtor as $one)
                    {{$Total_debtor = $one->price + $Total_debtor}}
                @endforeach

                @foreach ($Creditor as $two)
                    {{$Total_Creditor = $two->price + $Total_Creditor}}
                    {{$paid_up = $two->price + $paid_up}}
                @endforeach


            </div>
            <tr>
                <td>{{  number_format($Total_debtor, 2)}} جنيه</td>
                <td style="color:green">{{ number_format($paid_up , 2)}} جنيه</td>
                <td style="color:red">{{ number_format($Total_debtor - $Total_Creditor , 2)}} جنيه</td>
            </tr>
        </tbody>
    </table>

     <div class="x_content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <table id="datatable-keytable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>رقم القيد</th>
                            <th>من حساب</th>
                            <th>الى حساب </th>
                            <th>المبلغ</th>
                            <th>التاريخ</th>
                            <th>البيان</th>
                        </tr>
                        </thead>
                        <tbody>
                                {{-- <span>{{$item->agent->tree4_code}}</span> --}}

                                {{-- @livewire('model' ,['item_id' => $item->agent->tree4_code]) --}}
                            @foreach ($debtor as $one)
                                <tr>
                                    <th scope="row">{{$id++}}</th>
                                    <td>{{$one->registration_number}}</td>
                                    <td>
                                        @isset($one->Creditors->tree4_name)
                                            {{$one->Creditors->tree4_name}}
                                        @endisset
                                    </td>

                                    <td>{{$one->debtors->tree4_name}}</td>
                                    <td>{{ number_format($one->price  , 2)}} جنيه</td>
                                    <td>{{$one->date}}</td>
                                    <td>{{$one->Statement}}</td>
                                </tr>
                            @endforeach
                            @foreach ($Creditor as $one)
                                <tr>
                                    <th scope="row">{{$id++}}</th>
                                    <td>{{$one->registration_number}}</td>
                                    <td>@isset($one->Creditors->tree4_name)
                                        {{$one->Creditors->tree4_name}}
                                    @endisset</td>
                                    <td>
                                        @isset($one->debtors->tree4_name)
                                            {{$one->debtors->tree4_name}}
                                        @endisset
                                    </td>

                                    <td>{{ number_format($one->price  , 2)}} جنيه </td>
                                    <td>{{$one->date}}</td>
                                    <td>{{$one->Statement}}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.js')

    </body>
</html>
