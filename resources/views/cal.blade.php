@extends('layouts.app')
@section('title', 'หน้าแรก')

@section('content')
    <p>คำนวณราคาโกดังเช่า</p>

    <div class="row">
        <div class="col">
            <label>ราคาโกดังเช่า: </label>
            <input type="number" class="form-control" id="input1" onchange="summation()">
            <label>ตารางเมตร: </label>
            <input type="number" class="form-control" id="input2" onchange="summation()">
            <div class="col">
            </div>
            <div class="col py-1">
            </div>
            <p>รายการคำนวน: </p>
            <p id="res1"></p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <label><u>นิติบุคคล: </u></label>
            <p id="lge"></p>
        </div>
        <div class="col">
            <label><u>บุคคลธรรมดา: </u></label>
            <p id="Ide"></p>
        </div>
    </div>




    {{-- <p>Input 3 : <input id="input3" type="number"  onchange="summation()"></p>
    <p id="total"></p> --}}
@endsection

{{-- @push('scripts') --}}
<script>
    function summation() {
        var input1 = document.getElementById('input1').value;
        var input2 = document.getElementById('input2').value;
        // var input3 = document.getElementById('input3').value;
        // var total = (input1*1) + (input2*1) +(input3*1);
        // document.getElementById('total').innerHTML = "Total = $"+total;
        let fixprice = Intl.NumberFormat('th-TH')

        // คำนวนราคาโกดังธรรมดา
        let percent5 = input1 / 100 * 5
        let res1 = input1 - percent5
        let deposit = res1 * 2
        let sum = Number(deposit) + Number(input1)
        let sqmeter = input2 * 5
        // let taxes = Number(sqmeter) + (Number(sqmeter * 0.05)
        let taxes = sqmeter * 100 / 95


        //คำนวนราคานิติบุคคล
        let lge5 = Number(input1) * 0.05
        let depositLge = Number(input1) + Number(input1)
        let sumLge = depositLge + Number(input1)
        // let taxesLge = (sqmeter * 100 / 95) - sqmeter
        let taxesLge = taxes * 0.05
        let resultLge = sumLge - lge5 + Number(taxes.toFixed(2) - Number(taxesLge.toFixed(2)))

        //คำนวนราคาบุคคลธรรมดา
        let lde5 = 0
        let depositIde = input1 * 2
        let depositIde1 = Number(depositIde) + Number(input1)
        let taxesIde = 0
        let sumIde = Number(input1) + Number(input1)
        let resultIde = depositIde1 + sqmeter

        // รายการคำนวน
        // document.getElementById('res1').innerHTML = "หักภาษี ณ ที่จ่าย 5 %: " + res1.toLocaleString('th-TH') + " บาท <br/> มัดจำ 2 เดือน: " + deposit.toLocaleString('th-TH') + " บาท<br/> รวมเป็นเงิน: " + sum.toLocaleString('th-TH') + " บาท <br/>ภาษีที่ดินและสิ่งปลูกสร้าง: " + sqmeter + " บาท"

        resultIde.toLocaleString('th-TH') + " บาท"

        // รายการนิติบุคคล
        document.getElementById('lge').innerHTML = `
            ราคาโกดัง + รวมหักภาษี ณ ที่จ่าย 5 %: <span style="color:green">${Number(input1).toLocaleString('th-TH')}</span> บาท <br/>
            มัดจำ 2 เดือน: <span style="color:green">${fixprice.format(depositLge.toFixed(2))} </span> บาท<br/>
            รวมเป็นเงิน: <span style="color:green">${fixprice.format(sumLge.toFixed(2))}</span> บาท <br/>
            หักภาษี ณ ที่จ่าย 5% (เฉพาะค่าเช่า): <span style="color:red">${fixprice.format(lge5.toFixed(2))}</span> บาท<br/>
            ภาษีที่ดินและสิ่งปลูกสร้าง: <span style="color:green">${fixprice.format(taxes.toFixed(2))} </span> บาท <br/>
            หักภาษี ณ ที่จ่าย 5% (เฉพาะที่ดิน): <span style="color:red">${fixprice.format(taxesLge.toFixed(2))}</span> บาท <br/>
            รวมทั้งหมด:  <span style="color:green">${fixprice.format(resultLge.toFixed(2))}</span> บาท`

        // รายการบุคคลธรรมดา
        document.getElementById('Ide').innerHTML = `
            ราคาโกดัง + รวมหักภาษี ณ ที่จ่าย 5 %: <span style="color:green">${Number(input1).toLocaleString('th-TH')}</span> บาท <br/>
            มัดจำ 2 เดือน: <span style="color:green">${sumIde.toLocaleString('th-TH')}</span> บาท<br/>
            รวมเป็นเงิน: <span style="color:green">${depositIde1.toLocaleString('th-TH')}</span> บาท <br/>
            หักภาษี ณ ที่จ่าย 5% (เฉพาะค่าเช่า): <span style="color:red">${lde5.toLocaleString('th-TH')}</span> บาท<br/>
            ภาษีที่ดินและสิ่งปลูกสร้าง: <span style="color:green">${fixprice.format(sqmeter)}</span> บาท <br/>
            หักภาษี ณ ที่จ่าย 5% (เฉพาะที่ดิน): <span style="color:red">${taxesIde.toFixed(2)}</span> บาท <br/>
            รวมทั้งหมด:  <span style="color:green">${resultIde.toLocaleString('th-TH')}</span> บาท`

        // document.getElementById('Ide').innerHTML = "ราคาโกดัง + หักภาษี ณ ที่จ่าย 5 %: " + Number(input1).toLocaleString('th-TH') + " บาท <br/> มัดจำ 2 เดือน: " + sumIde.toLocaleString('th-TH') + " บาท<br/> รวมเป็นเงิน: " + depositIde1.toLocaleString('th-TH') + " บาท <br/> ภาษี ณ ที่จ่าย 5%: " + lde5.toLocaleString('th-TH') + " บาท <br/>ภาษีที่ดินและสิ่งปลูกสร้าง: " + fixprice.format(sqmeter) + " บาท <br/> รวมภาษีที่หัก: " + taxesIde.toFixed(2)  + "<br/>รวมทั้งหมด: " + resultIde.toLocaleString('th-TH') + " บาท"

    }
</script>
{{-- @endpush --}}
