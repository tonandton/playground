@extends('layouts.app')
@section('title', 'หน้าแรก')

@section('content')
    <p>คำนวณราคาโกดังเช่า</p>

    <div class="row">
        <div class="col-2">
            <label>ราคาโกดังเช่า: </label>
            <input type="number" class="form-control" id="input1" onchange="summation()">
        </div>
        <div class="col-2">
            <label>ตารางเมตร: </label>
            <input type="number" class="form-control" id="input2" onchange="summation()">
            <div class="col">
            </div>
            <div class="col py-1">
            </div>
        </div>
        <div class="col-2">
            <label>ค่าส่วนกลางแรกเข้า: </label>
            <input type="number" class="form-control" id="input3" onchange="summation()">
            <div class="col"></div>
            <div class="col py-1"></div>
        </div>
        <div class="col-2">
            <label>ค่าส่วนลางรายเดือน: </label>
            <input type="number" class="form-control" id="input4" onchange="summation()">
            <div class="col"></div>
            <div class="col py-1"></div>
        </div>
        {{-- <div class="col-2">
            <label>ค่าภาษีติดอากรสแตมป์: </label>
            <input type="number" class="form-control" id="input5" onchange="summation()">
            <div class="col"></div>
            <col class="py-1">
        </div> --}}
        <div class="col-2">
            <label>ส่วนลด: </label>
            <input type="number" class="form-control" id="input6" onchange="summation()">
            <div class="col"></div>
            <col class="py-1">
        </div>
        <div class="col-2">
            <label>จำนวนเช่ากี่เดือน: </label>
            {{-- <input type="number" class="form-control" id="input7" onchange="summation()"
                placeholder="เช่าไม่เกิน 36 เดือน" maxlength="4"> --}}
            <select name="" id="input7" class="form-select">
                <option value="1">1 เดือน</option>
                <option value="2">2 เดือน</option>
                <option value="3">3 เดือน</option>
                <option value="4">4 เดือน</option>
                <option value="5">5 เดือน</option>
                <option value="6">6 เดือน</option>
                <option value="7">7 เดือน</option>
                <option value="8">8 เดือน</option>
                <option value="9">9 เดือน</option>
                <option value="10">10 เดือน</option>
                <option value="11">11 เดือน</option>
                <option value="12">12 เดือน</option>
                <option value="13">13 เดือน</option>
                <option value="14">14 เดือน</option>
                <option value="15">15 เดือน</option>
                <option value="16">16 เดือน</option>
                <option value="17">17 เดือน</option>
                <option value="18">18 เดือน</option>
                <option value="19">19 เดือน</option>
                <option value="20">20 เดือน</option>
                <option value="21">21 เดือน</option>
                <option value="22">22 เดือน</option>
                <option value="23">23 เดือน</option>
                <option value="24">24 เดือน</option>
                <option value="25">25 เดือน</option>
                <option value="26">26 เดือน</option>
                <option value="27">27 เดือน</option>
                <option value="28">28 เดือน</option>
                <option value="29">29 เดือน</option>
                <option value="30">30 เดือน</option>
                <option value="31">31 เดือน</option>
                <option value="32">32 เดือน</option>
                <option value="33">33 เดือน</option>
                <option value="34">34 เดือน</option>
                <option value="35">35 เดือน</option>
                <option value="36">36 เดือน</option>
                option
            </select>
            <div class="col"></div>
            <col class="py-1">
        </div>
    </div>
    <p>รายการคำนวน: </p>
    <p id="res1"></p>
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
        var input1 = document.getElementById('input1').value; // ราคาโกดังเช่า
        var input2 = document.getElementById('input2').value; // ตารางเมตร
        var input3 = document.getElementById('input3').value; // ค่าส่วนกลางแรกเข้า
        var input4 = document.getElementById('input4').value; // ค่าส่วนกลางรายเดือน
        // var input5 = document.getElementById('input5').value;
        var input6 = document.getElementById('input6').value; // ส่วนลด
        var input7 = document.getElementById('input7').value; // จำนวนเดือนที่เช่า

        let fixprice = Intl.NumberFormat('th-TH')

        // คำนวนราคาโกดังธรรมดา
        let sqmeter = input2 * 5 // ตารางเมตร * 5 (ภาษีที่ดินและสิ่งปลูกสร้าง)
        let in_Commonfee = Number(input3) // ค่าส่วนกลางแรกเข้า
        let m_Commonfee = Number(input4) // ค่าส่วนกลางรายเดือน
        // let taxes = sqmeter * 100 / 95 // ภาษีที่ดินและสิ่งปลูกสร้าง + 5%

        // คำนวนราคานิติบุคคล
        let lge5 = Number(input1) * 100 / 95 // ราคาโกดัง * 100 / 95
        let lge5_1 = lge5 - Number(input1) // ราคาโกดัง * 100 / 95 - ราคาโกดัง = ค่าส่วนต่าง
        let depositLge = Number(input1) + Number(input1) // มัดจำ
        let sumLge = depositLge + Number(input1) // ราคาโกดัง + มัดจำ
        let taxesLge = (sqmeter * 100 / 95) - sqmeter // ค่าส่วนต่างของ ภาษีที่ดินและสิ่งปลูกสร้าง
        let rantal = ((Number(input1) * Number(input7)) / 1000) + 5 // ค่าภาษีอากรแสตมป์ ในการทำสัญญา
        let resultLge = sumLge + lge5_1 + sqmeter + taxesLge + in_Commonfee + m_Commonfee + rantal

        //คำนวนราคาบุคคลธรรมดา
        let lde5 = 0
        let depositIde = input1 * 2
        let depositIde1 = Number(depositIde) + Number(input1)
        let taxesIde = 0
        let sumIde = Number(input1) + Number(input1)
        let resultIde = depositIde1 + sqmeter

        resultIde.toLocaleString('th-TH') + " บาท"

        // รายการนิติบุคคล
        document.getElementById('lge').innerHTML = `
            ราคาโกดัง: <span style="color:green">${Number(input1).toLocaleString('th-TH')}</span> บาท <br/>
            มัดจำ 2 เดือน: <span style="color:green">${fixprice.format(depositLge.toFixed(2))} </span> บาท<br/>
            รวมเป็นเงิน: <span style="color:green">${fixprice.format(sumLge.toFixed(2))}</span> บาท <br/>
            ภาษีหัก ณ ที่จ่าย 5% (เฉพาะค่าเช่า): <span style="color:green">${fixprice.format(lge5_1.toFixed(2))}</span> บาท<br/>
            ภาษีที่ดินและสิ่งปลูกสร้าง: <span style="color:green">${fixprice.format(sqmeter)} </span> บาท <br/>
            ภาษีหัก ณ ที่จ่าย 5% (เฉพาะที่ดิน): <span style="color:green">${fixprice.format(taxesLge.toFixed(2))}</span> บาท <br/>
            ค่าส่วนกลางแรกเข้า: <span style="color:green">${fixprice.format(in_Commonfee)}</span> บาท <br>
            ค่าส่วนกลางแรกรายเดือน: <span style="color:green">${fixprice.format(m_Commonfee)}</span> บาท <br>
            ค่าคิดอากรแสตมป์: <span style="color:green">${fixprice.format(rantal)}</span> บาท<br>
            รวมทั้งหมด:  <span style="color:green">${fixprice.format(resultLge.toFixed(2))}</span> บาท`

        // รายการบุคคลธรรมดา
        document.getElementById('Ide').innerHTML = `
            ราคาโกดัง: <span style="color:green">${Number(input1).toLocaleString('th-TH')}</span> บาท <br/>
            มัดจำ 2 เดือน: <span style="color:green">${sumIde.toLocaleString('th-TH')}</span> บาท<br/>
            รวมเป็นเงิน: <span style="color:green">${depositIde1.toLocaleString('th-TH')}</span> บาท <br/>
            ภาษีหัก ณ ที่จ่าย 5% (เฉพาะค่าเช่า): <span style="color:green">${lde5.toLocaleString('th-TH')}</span> บาท<br/>
            ภาษีที่ดินและสิ่งปลูกสร้าง: <span style="color:green">${fixprice.format(sqmeter)}</span> บาท <br/>
            ภาษีหัก ณ ที่จ่าย 5% (เฉพาะที่ดิน): <span style="color:green">${taxesIde.toFixed(2)}</span> บาท <br/>
            รวมทั้งหมด:  <span style="color:green">${resultIde.toLocaleString('th-TH')}</span> บาท`


    }
</script>
{{-- @endpush --}}
