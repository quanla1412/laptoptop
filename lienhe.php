<?php include "./header.php"?>
<div class="container-xl">
    <div class="row p-0 m-0" style="">
        <div class=" w-50 d-flex justify-content-center align-items-center p-0 " style="background-color: #E5E5E5; height: 400px;">
            <?php 
                if (isset($_GET['cs']) == 0) echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6697269378988!2d106.68006961442788!3d10.759917092332769!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1b7c3ed289%3A0xa06651894598e488!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBTw6BpIEfDsm4!5e0!3m2!1svi!2s!4v1649862985682!5m2!1svi!2s" width="100%" height="100%" style="border:0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                elseif ($_GET['cs'] == 1) echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4154191661232!2d106.68269391471844!3d10.77946089231946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f2f7ed0d5b9%3A0xb5f8a75200bda6fc!2zMTA1IELDoCBIdXnhu4duIFRoYW5oIFF1YW4sIFbDtSBUaOG7iyBTw6F1LCBRdeG6rW4gMywgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1650967732135!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                else echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.3705878624487!2d106.70399921471852!3d10.782902592317182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f4eae8fffff%3A0x59afa6cd392e9e1!2zMWEgxJAuIE5ndXnhu4VuIEjhu691IEPhuqNuaCwgQuG6v24gTmdow6ksIFF14bqtbiAxLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1650967797301!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                
            ?>    
        </div>
        <div class="w-50 ps-0 pe-0 " style="">
            <div class="" style=" ;">
                <a href="./lienhe.php">
                <button class="border-0 btn-lienhe w-100 text-start ">Cơ Sở Chính<br>
                Địa chỉ : 273, An Dương Vương, P.3, Q.5, Tp.Hồ Chí Minh<br>
                Điện Thoại: 0327658521<br>
                Email: tuanthanh15112002@gmail.com
                </button>
            </a></div>
            <div class="" style=""><a href="./lienhe.php?cs=1">
                <button class="border-0 btn-lienhe w-100 text-start " >Cơ Sở 1<br>
                Địa chỉ : 105, Bà Huyện Thanh Quan, Q.3, Tp.Hồ Chí Minh<br>
                Điện Thoại: 0327658521<br>
                Email: tuanthanh15112002@gmail.com
                </button>
            </a></div>
            <div class="" style=""><a href="./lienhe.php?cs=2">
                <button class="border-0 btn-lienhe w-100 text-start ">Cơ Sở 2<br>
                Địa chỉ : 1A, Nguyễn Hữu Cảnh, P.Bến Nghé, Q.1, Tp.Hồ Chí Minh<br>
                Điện Thoại: 0327658521<br>
                Email: tuanthanh15112002@gmail.com
                </button>
            </a></div>
        </div>
    </div>
</div>

<?php include "./footer.php" ?>
