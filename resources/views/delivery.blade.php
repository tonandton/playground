@extends('layouts.app')
@section('title', 'หน้าแรก')

@section('content')

    <h3>คำนวณค่าขนส่ง</h3>

    <div class="row">
        <div class="col-4">
            <label for="">ประเภทรถ</label>
            <select name="" id="mySelect" class="form-select" onchange="truck()">
                <option value="">เลือกประเภทรถ</option>
                <option value="non">ไม่มี (ลูกค้ามารับเอง)</option>
                <option value="pickup-truck">รถกระบะ (บรรทุกไม่เกิน 1 ตัน สินค้าไม่เกิน 4 เมตร)</option>
                <option value="6wheel-truck">รถบรรทุก 6 ล้อ (บรรทุกได้ไม่เกิน 6 ตัน)</option>
                <option value="10wheel-truck">รถบรรทุก 6 ล้อ | 10 เฮี๊ยบ (บรรทุกได้ไม่เกิน 15 ตัน)</option>
            </select>
        </div>
        <div class="col-2">
            <label for="">ระยะทาง</label>
            <input type="number" class="form-control" id="distance" onchange="truck()">
        </div>
        <div class="col-2">
            <label for="">กิโลเมตรเริ่มต้น</label>
            <input type="number" class="form-control" id="startKilometer" onchange="truck()" disabled>
        </div>
        <div class="col-2">
            <label for="">ราคาต่อกิโลเมตร</label>
            <input type="number" class="form-control" id="priceperKM" disabled>
        </div>
        <div class="col-2">
            <label for="">ราคาเริ่มต้น</label>
            <input type="" class="form-control" id="price-default" disabled placeholder="">
        </div>
    </div>
    <hr>
    <div class="row">
        <h5 style="color:red; text-decoration:underline">ระยะทางส่งของ</h5>
        <div class="col-3">
            <label for="">ระยะทางที่เกิน</label>
            <input type="" class="form-control" id="dis-result" disabled placeholder="">
        </div>
        <div class="col-3">
            <label for="">ราคาระยะทาง บาท / กิโลเมตร</label>
            <input type="" class="form-control" id="disPrice-result" disabled placeholder="">
        </div>
        <div class="col-3">
            <label for="">ราคาจริงที่ส่งหน้างาน (ไม่รวมขากลับ)</label>
            <input type="" class="form-control" id="price-result" disabled placeholder="">
        </div>
    </div>
    <br>
    <div class="row">
        <h5 style="color:red; text-decoration:underline">ระยะทางส่งของ ไป - กลับ</h5>
        <div class="col-3">
            <label for="">ระยะทางที่เกิน (รวมไป - กลับ)</label>
            <input type="" class="form-control" id="realDis-result" disabled placeholder="">
        </div>
        <div class="col-3">
            <label for="">ราคาระยะทาง บาท / กิโลเมตร</label>
            <input type="" class="form-control" id="realDisPrice-result" disabled placeholder="">
        </div>
        <div class="col-3">
            <label for="">ราคาจริงที่ส่งหน้างาน (รวมไป - กลับ)</label>
            <input type="" class="form-control" id="realPrice-result" disabled placeholder="">
        </div>
    </div>


@endsection

<script>
    function truck() {

        // ค่าเริ่มต้น
        let fixPrice = fixprice = Intl.NumberFormat('th-TH')
        let non = 0
        let truckPrice = null
        let truckPerKM = null
        let pickupTruck = [1500, 10] // รถกระบะ
        let SixwheelTruck = [5000, 20] // รถ 6 ล้อ
        let TenwheelTruck = [7000, 30] // รถ 6 ล้อ และ 10 ล้อเฮี้ยบ

        let KM = 30 // กิโลเริ่มต้น

        // ค่าใน input
        let truck = document.getElementById("mySelect").value; // รถขนส่ง
        let distance = document.getElementById("distance").value; // ระยะทาง
        let startKM = document.getElementById("startKilometer").value = KM; // กิโลเมตรเริ่ม
        let periceperKM = document.getElementById("priceperKM").value;  // ราคา/กิโลเมตร


        // เงื่อนไข ราคารถขนส่ง
        if (truck === 'pickup-truck') {
            truckPrice = document.getElementById("price-default").placeholder = pickupTruck[0]
            truckPerKM = document.getElementById("priceperKM").value = pickupTruck[1]
        } else if (truck === '6wheel-truck') {
            truckPrice = document.getElementById("price-default").placeholder = SixwheelTruck[0]
            truckPerKM = document.getElementById("priceperKM").value = SixwheelTruck[1]
        } else if (truck === '10wheel-truck') {
            truckPrice = document.getElementById("price-default").placeholder = TenwheelTruck[0]
            truckPerKM = document.getElementById("priceperKM").value = TenwheelTruck[1]
        } else {
            truckPrice = document.getElementById("price-default").placeholder = non
        }

        // ระยะทางส่งของ
        // ระยะทางจริง
        let distanceKM = distance - KM
        // ราคาระยะทางจริง
        let realDisPrice = distanceKM * periceperKM
        // ราคาขส่งของ - ขาไป
        let goResult = realDisPrice + truckPrice

        let realDisKM = KM + distanceKM
        let realDisKM2 = (realDisKM * periceperKM) * 2
        // let realPiceResult = realDisKM2 + goResult

        // fix Bug ระยะทาง คูณกับราคารถ
        let truckRealDis = realDisKM2 + truckPrice
        // console.log(realDisKM2)


        // เงื่อนไขหากระยะทางมากกว่า KM จะเพิ่มตามระยะทางต่อกิโลเมตร
        if (distance > KM) {

            // ระยะทางส่งของ //
            document.getElementById('dis-result').placeholder = distanceKM + " Km"
            document.getElementById('disPrice-result').placeholder = fixPrice.format(realDisPrice) + " Baht/Km"
            document.getElementById('price-result').placeholder = fixPrice.format(goResult) + " Baht"

            // ระยะทางส่งของ ไป - กลับ
            document.getElementById('realDis-result').placeholder = distance * 2 + " Km"
            document.getElementById('realDisPrice-result').placeholder = fixPrice.format(realDisKM2) + " Baht/Km"
            document.getElementById('realPrice-result').placeholder = fixPrice.format(truckRealDis) + " Baht"

            //
        } else if (distance <= KM) {

            // ระยะทางส่งของ
            document.getElementById('dis-result').placeholder = distance + " Km"
            document.getElementById('disPrice-result').placeholder = fixPrice.format(periceperKM) + " Baht/Km"
            document.getElementById('price-result').placeholder = fixPrice.format(truckPrice) + " Baht"

            // // ระยะทางส่งของ ไป - กลับ
            document.getElementById('realDis-result').placeholder = distance * 2 + " Km"
            document.getElementById('realDisPrice-result').placeholder = fixPrice.format(realDisKM2) + " Baht/Km"
            document.getElementById('realPrice-result').placeholder = fixPrice.format(truckRealDis) + " Baht"
            // document.getElementById('realPrice-result').placeholder = realPrice - realDisPrice - realDisKM

        }
    }
</script>
