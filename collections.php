<?php include "./header.php";  
    $minPrice = $_GET['minPrice'] ?? "";
    $maxPrice = $_GET['maxPrice'] ?? "";

    $danhSachSanPham = filter(tenSP: $_GET['tenSP'] ?? "",
                                tenHang: $_GET['tenHang'] ?? array(), 
                                mauSac: $_GET['mauSac'] ?? array(), 
                                CPU: $_GET['CPU'] ?? array(), 
                                RAM: $_GET['RAM'] ?? array(), 
                                minPrice: $minPrice == "" ? 0 : $minPrice, 
                                maxPrice: $maxPrice == "" ? 1000000000 : $maxPrice);

    define('MAX_QUANTITY',12);  //So luong hien thi toi da san pham trong 1 trang

    $trangHienTai = $_GET['p'] ?? 1;

    $soTrang = soTrang($danhSachSanPham, MAX_QUANTITY); 
?>

<div class="container-xl">
    <!-- Bo loc -->
    <div class="row mb-3">
        <!-- Bo loc mobile -->
        <a class="d-block d-lg-none btn btn-primary ms-2" data-bs-toggle="offcanvas" href="#boloc" role="button" aria-controls="boloc" style="width: 120px; background-color: var(--third-color);">
            Bộ lọc
        </a>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="boloc" aria-labelledby="offcanvasExampleLabel" style="width: 320px;">
            <!-- Nut X -->
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Bộ lọc</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="mobile-filter offcanvas-body">
                <!-- Lọc mobile tên hãng -->
                <div class="row g-3 mb-3">
                    <div class="col-12 d-flex align-items-end"><p class="h6">Thương hiệu: </p></div>
                    <div class="col-6" style="height: 38px;">
                        <label for="mobile_tenHang_ACER" onclick="chonHoacHuyChon('mobile_label_tenHang_ACER')" id="mobile_label_tenHang_ACER" class="me-1 btn btn-filter btn btn-filter w-100
                        <?php if(checkTenHang("ACER")) echo 'active'?>">ACER</label>                        
                        <input form="mobile_search_box" type="checkbox" name="tenHang[]" id="mobile_tenHang_ACER" value="ACER" <?php if(checkTenHang("ACER")) echo'checked' ?> >
                    </div>

                    <div class="col-6" style="height: 38px;">
                        <label for="mobile_tenHang_ASUS" onclick="chonHoacHuyChon('mobile_label_tenHang_ASUS')" id="mobile_label_tenHang_ASUS" class="me-1 btn btn-filter btn btn-filter w-100
                        <?php if(checkTenHang("ASUS")) echo 'active'?>">ASUS</label>                        
                        <input form="mobile_search_box" type="checkbox" name="tenHang[]" id="mobile_tenHang_ASUS" value="ASUS" <?php if(checkTenHang("ASUS")) echo'checked' ?> >
                    </div>

                    <div class="col-6" style="height: 38px;">
                        <label for="mobile_tenHang_DELL" onclick="chonHoacHuyChon('mobile_label_tenHang_DELL')" id="mobile_label_tenHang_DELL" class="me-1 btn btn-filter btn btn-filter w-100
                        <?php if(checkTenHang("DELL")) echo 'active'?>">DELL</label>                        
                        <input form="mobile_search_box" type="checkbox" name="tenHang[]" id="mobile_tenHang_DELL" value="DELL" <?php if(checkTenHang("DELL")) echo'checked' ?> >
                    </div>

                    <div class="col-6" style="height: 38px;">
                        <label for="mobile_tenHang_GIGABYTE" onclick="chonHoacHuyChon('mobile_label_tenHang_GIGABYTE')" id="mobile_label_tenHang_GIGABYTE" class="me-1 btn btn-filter btn btn-filter w-100
                        <?php if(checkTenHang("GIGABYTE")) echo 'active'?>">GIGABYTE</label>                        
                        <input form="mobile_search_box" type="checkbox" name="tenHang[]" id="mobile_tenHang_GIGABYTE" value="GIGABYTE" <?php if(checkTenHang("GIGABYTE")) echo'checked' ?> >
                    </div>

                    <div class="col-6" style="height: 38px;">
                        <label for="mobile_tenHang_HP" onclick="chonHoacHuyChon('mobile_label_tenHang_HP')" id="mobile_label_tenHang_HP" class="me-1 btn btn-filter btn btn-filter w-100
                        <?php if(checkTenHang("HP")) echo 'active'?>">HP</label>                        
                        <input form="mobile_search_box" type="checkbox" name="tenHang[]" id="mobile_tenHang_HP" value="HP" <?php if(checkTenHang("HP")) echo'checked' ?> >
                    </div>

                    <div class="col-6" style="height: 38px;">
                        <label for="mobile_tenHang_LG" onclick="chonHoacHuyChon('mobile_label_tenHang_LG')" id="mobile_label_tenHang_LG" class="me-1 btn btn-filter btn btn-filter w-100
                        <?php if(checkTenHang("LG")) echo 'active'?>">LG</label>                        
                        <input form="mobile_search_box" type="checkbox" name="tenHang[]" id="mobile_tenHang_LG" value="LG" <?php if(checkTenHang("LG")) echo'checked' ?> >
                    </div>

                    <div class="col-6" style="height: 38px;">
                        <label for="mobile_tenHang_LENOVO" onclick="chonHoacHuyChon('mobile_label_tenHang_LENOVO')" id="mobile_label_tenHang_LENOVO" class="me-1 btn btn-filter btn btn-filter w-100
                        <?php if(checkTenHang("LENOVO")) echo 'active'?>">LENOVO</label>                        
                        <input form="mobile_search_box" type="checkbox" name="tenHang[]" id="mobile_tenHang_LENOVO" value="LENOVO" <?php if(checkTenHang("LENOVO")) echo'checked' ?> >
                    </div>

                    <div class="col-6" style="height: 38px;">
                        <label for="mobile_tenHang_MICROSOFT" onclick="chonHoacHuyChon('mobile_label_tenHang_MICROSOFT')" id="mobile_label_tenHang_MICROSOFT" class="me-1 btn btn-filter btn btn-filter w-100
                        <?php if(checkTenHang("MICROSOFT")) echo 'active'?>">MICROSOFT</label>                        
                        <input form="mobile_search_box" type="checkbox" name="tenHang[]" id="mobile_tenHang_MICROSOFT" value="MICROSOFT" <?php if(checkTenHang("MICROSOFT")) echo'checked' ?> >
                    </div>

                    <div class="col-6" style="height: 38px;">
                        <label for="mobile_tenHang_MSI" onclick="chonHoacHuyChon('mobile_label_tenHang_MSI')" id="mobile_label_tenHang_MSI" class="me-1 btn btn-filter btn btn-filter w-100
                        <?php if(checkTenHang("MSI")) echo 'active'?>">MSI</label>                        
                        <input form="mobile_search_box" type="checkbox" name="tenHang[]" id="mobile_tenHang_MSI" value="MSI" <?php if(checkTenHang("MSI")) echo'checked' ?> >
                    </div>
                </div>
                <!-- Lọc mobile màu sắc -->
                <div class="row g-3 mb-3">
                    <div class="col-12 d-flex align-items-end"><p class="h6">Màu sắc: </p></div>
                    <div class="col-6" style="height: 38px;">                        
                        <label for="mobile_mauSac_trang" onclick="chonHoacHuyChon('mobile_label_mauSac_trang')" id="mobile_label_mauSac_trang" class="btn btn-filter w-100 
                        <?php if(checkMauSac("trắng")) echo 'active'?>">Trắng</label>                        
                        <input form="mobile_search_box" type="checkbox" name="mauSac[]" id="mobile_mauSac_trang" value="trắng" <?php if(checkMauSac("trắng")) echo'checked' ?> >
                    </div>
                    <div class="col-6" style="height: 38px;">                        
                        <label for="mobile_mauSac_bac" onclick="chonHoacHuyChon('mobile_label_mauSac_bac')" id="mobile_label_mauSac_bac" class="btn btn-filter w-100 
                        <?php if(checkMauSac("bạc")) echo 'active'?>">Bạc</label>                        
                        <input form="mobile_search_box" type="checkbox" name="mauSac[]" id="mobile_mauSac_bac" value="bạc" <?php if(checkMauSac("bạc")) echo'checked' ?> >
                    </div>
                    <div class="col-6" style="height: 38px;">                        
                        <label for="mobile_mauSac_xam" onclick="chonHoacHuyChon('mobile_label_mauSac_xam')" id="mobile_label_mauSac_xam" class="btn btn-filter w-100 
                        <?php if(checkMauSac("xám")) echo 'active'?>">Xám</label>                        
                        <input form="mobile_search_box" type="checkbox" name="mauSac[]" id="mobile_mauSac_xam" value="xám" <?php if(checkMauSac("xám")) echo'checked' ?> >
                    </div>
                    <div class="col-6" style="height: 38px;">                        
                        <label for="mobile_mauSac_den" onclick="chonHoacHuyChon('mobile_label_mauSac_den')" id="mobile_label_mauSac_den" class="btn btn-filter w-100 
                        <?php if(checkMauSac("đen")) echo 'active'?>">Đen</label>                        
                        <input form="mobile_search_box" type="checkbox" name="mauSac[]" id="mobile_mauSac_den" value="đen" <?php if(checkMauSac("đen")) echo'checked' ?> >
                    </div>
                </div>
                <!-- Lọc mobile cpu -->
                <div class="row g-3 mb-3">
                    <div class="col-12 d-flex align-items-end"><p class="h6">CPU: </p></div>
                    <div class="col-6" style="height: 38px;">
                        <label for="mobile_cpu_i3" onclick="chonHoacHuyChon('mobile_label_cpu_i3')" id="mobile_label_cpu_i3" class="btn btn-filter w-100 
                        <?php if(checkCPU("Core i3")) echo 'active'?>">Core i3</label>                        
                        <input form="mobile_search_box" type="checkbox" name="CPU[]" id="mobile_cpu_i3" value="Core i3" <?php if(checkCPU("Core i3")) echo'checked' ?> >
                    </div>
                    <div class="col-6" style="height: 38px;">
                        <label for="mobile_cpu_i5" onclick="chonHoacHuyChon('mobile_label_cpu_i5')" id="mobile_label_cpu_i5" class="btn btn-filter w-100 
                        <?php if(checkCPU("Core i5")) echo 'active'?>">Core i5</label>                        
                        <input form="mobile_search_box" type="checkbox" name="CPU[]" id="mobile_cpu_i5" value="Core i5" <?php if(checkCPU("Core i5")) echo'checked' ?> >
                    </div>
                    <div class="col-6" style="height: 38px;">
                        <label for="mobile_cpu_i7" onclick="chonHoacHuyChon('mobile_label_cpu_i7')" id="mobile_label_cpu_i7" class="btn btn-filter w-100 
                        <?php if(checkCPU("Core i7")) echo 'active'?>">Core i7</label>                        
                        <input form="mobile_search_box" type="checkbox" name="CPU[]" id="mobile_cpu_i7" value="Core i7" <?php if(checkCPU("Core i7")) echo'checked' ?> >
                    </div>
                    <div class="col-6" style="height: 38px;">
                        <label for="mobile_cpu_i9" onclick="chonHoacHuyChon('mobile_label_cpu_i9')" id="mobile_label_cpu_i9" class="btn btn-filter w-100 
                        <?php if(checkCPU("Core i9")) echo 'active'?>">Core i9</label>                        
                        <input form="mobile_search_box" type="checkbox" name="CPU[]" id="mobile_cpu_i9" value="Core i9" <?php if(checkCPU("Core i9")) echo'checked' ?> >
                    </div>
                    
                    <div class="col-6" style="height: 38px;">
                        <label for="mobile_cpu_r3" onclick="chonHoacHuyChon('mobile_label_cpu_r3')" id="mobile_label_cpu_r3" class="btn btn-filter w-100  
                        <?php if(checkCPU("Ryzen 3")) echo 'active'?>">Ryzen 3</label>                        
                        <input form="mobile_search_box" type="checkbox" name="CPU[]" id="mobile_cpu_r3" value="Ryzen 3" <?php if(checkCPU("Ryzen 3")) echo'checked' ?> >
                    </div>
                    
                    <div class="col-6" style="height: 38px;">
                        <label for="mobile_cpu_r5" onclick="chonHoacHuyChon('mobile_label_cpu_r5')" id="mobile_label_cpu_r5" class="btn btn-filter w-100  
                        <?php if(checkCPU("Ryzen 5")) echo 'active'?>">Ryzen 5</label>                        
                        <input form="mobile_search_box" type="checkbox" name="CPU[]" id="mobile_cpu_r5" value="Ryzen 5" <?php if(checkCPU("Ryzen 5")) echo'checked' ?> >
                    </div>
                    
                    <div class="col-6" style="height: 38px;">
                        <label for="mobile_cpu_r7" onclick="chonHoacHuyChon('mobile_label_cpu_r7')" id="mobile_label_cpu_r7" class="btn btn-filter w-100  
                        <?php if(checkCPU("Ryzen 7")) echo 'active'?>">Ryzen 7</label>                        
                        <input form="mobile_search_box" type="checkbox" name="CPU[]" id="mobile_cpu_r7" value="Ryzen 7" <?php if(checkCPU("Ryzen 7")) echo'checked' ?> >
                    </div>
                    
                    <div class="col-6" style="height: 38px;">
                        <label for="mobile_cpu_r9" onclick="chonHoacHuyChon('mobile_label_cpu_r9')" id="mobile_label_cpu_r9" class="btn btn-filter w-100  
                        <?php if(checkCPU("Ryzen 9")) echo 'active'?>">Ryzen 9</label>                        
                        <input form="mobile_search_box" type="checkbox" name="CPU[]" id="mobile_cpu_r9" value="Ryzen 9" <?php if(checkCPU("Ryzen 9")) echo'checked' ?> >
                    </div>
                </div>
                <!-- Lọc mobile ram -->
                <div class="row g-3 mb-3">
                    <div class="col-12 d-flex align-items-end"><p class="h6">Dung lượng RAM: </p></div>
                    <div class="col-6" style="height: 38px;">                    
                        <label for="mobile_ram_4gb" onclick="chonHoacHuyChon('mobile_label_ram_4gb')" id="mobile_label_ram_4gb" class="btn btn-filter w-100
                        <?php if(checkRAM("4")) echo 'active'?>">4 GB</label>                        
                        <input form="mobile_search_box" type="checkbox" name="RAM[]" id="mobile_ram_4gb" value="4" <?php if(checkRAM("4")) echo'checked' ?> >
                    </div>
                    
                    <div class="col-6" style="height: 38px;">                    
                        <label for="mobile_ram_8gb" onclick="chonHoacHuyChon('mobile_label_ram_8gb')" id="mobile_label_ram_8gb" class="btn btn-filter w-100
                        <?php if(checkRAM("8")) echo 'active'?>">8 GB</label>                        
                        <input form="mobile_search_box" type="checkbox" name="RAM[]" id="mobile_ram_8gb" value="8" <?php if(checkRAM("8")) echo'checked' ?> >
                    </div>
                    
                    <div class="col-6" style="height: 38px;">                    
                        <label for="mobile_ram_16gb" onclick="chonHoacHuyChon('mobile_label_ram_16gb')" id="mobile_label_ram_16gb" class="btn btn-filter w-100
                        <?php if(checkRAM("16")) echo 'active'?>">16 GB</label>                        
                        <input form="mobile_search_box" type="checkbox" name="RAM[]" id="mobile_ram_16gb" value="16" <?php if(checkRAM("16")) echo'checked' ?> >
                    </div>
                    
                    <div class="col-6" style="height: 38px;">                    
                        <label for="mobile_ram_32gb" onclick="chonHoacHuyChon('mobile_label_ram_32gb')" id="mobile_label_ram_32gb" class="btn btn-filter w-100
                        <?php if(checkRAM("32")) echo 'active'?>">32 GB</label>                        
                        <input form="mobile_search_box" type="checkbox" name="RAM[]" id="mobile_ram_32gb" value="32" <?php if(checkRAM("32")) echo'checked' ?> >
                    </div>
                    
                    <div class="col-6" style="height: 38px;">                    
                        <label for="mobile_ram_64gb" onclick="chonHoacHuyChon('mobile_label_ram_64gb')" id="mobile_label_ram_64gb" class="btn btn-filter w-100
                        <?php if(checkRAM("64")) echo 'active'?>">64 GB</label>                        
                        <input form="mobile_search_box" type="checkbox" name="RAM[]" id="mobile_ram_64gb" value="64" <?php if(checkRAM("64")) echo'checked' ?> >
                    </div>
                </div>
                <!-- Lọc mobile khoảng giá -->
                <div class="row g-3 mb-4">
                    <div class="col-12 d-flex align-items-center"><p class="h6">Khoảng giá: </p></div>
                    <div class="col-12 d-flex ps-0 align-items-center">
                        <input form="mobile_search_box" type="number" class="form-control d-inline-block" name="minPrice" min="0" placeholder="Từ" value="<?php echo $minPrice?>" style="width: 100px; ">
                        <p class="d-inline-block fw-bold mx-2" >~</p>
                        <input form="mobile_search_box" type="number" class="form-control d-inline-block" name="maxPrice" min="0" placeholder="Đến" value="<?php echo $maxPrice?>" style="width: 100px; " >
                    </div>
                </div>
                <button form="mobile_search_box" type="submit" class="btn btn-filter">Tìm kiếm</button>
            </div>
        </div>

        <!-- Bo loc pc -->
        <div class="d-none d-lg-block container-fluid rounded p-3 filter" style="background-color: var(--gray-color)">
            <div class="row"><p class="h5">Bộ lọc: </p></div>
            <!-- Lọc tên hãng -->
            <div class="row mb-3">
                <div class="col-2 d-flex align-items-end"><p class="h6">Thương hiệu: </p></div>
                <div class="col-10 d-flex ps-0 align-items-center">
                    <label for="tenHang_ACER" onclick="chonHoacHuyChon('label_tenHang_ACER')" id="label_tenHang_ACER" class="me-1 btn btn-filter 
                    <?php if(checkTenHang("ACER")) echo 'active'?>">ACER</label>                        
                    <input form="search_box" type="checkbox" name="tenHang[]" id="tenHang_ACER" value="ACER" <?php if(checkTenHang("ACER")) echo'checked' ?> >

                    <label for="tenHang_ASUS" onclick="chonHoacHuyChon('label_tenHang_ASUS')" id="label_tenHang_ASUS" class="me-1 btn btn-filter 
                    <?php if(checkTenHang("ASUS")) echo 'active'?>">ASUS</label>                        
                    <input form="search_box" type="checkbox" name="tenHang[]" id="tenHang_ASUS" value="ASUS" <?php if(checkTenHang("ASUS")) echo'checked' ?> >

                    <label for="tenHang_DELL" onclick="chonHoacHuyChon('label_tenHang_DELL')" id="label_tenHang_DELL" class="me-1 btn btn-filter 
                    <?php if(checkTenHang("DELL")) echo 'active'?>">DELL</label> 
                    <input form="search_box" type="checkbox" name="tenHang[]" id="tenHang_DELL" value="DELL" <?php if(checkTenHang("DELL")) echo'checked' ?> >

                    <label for="tenHang_GIGABYTE" onclick="chonHoacHuyChon('label_tenHang_GIGABYTE')" id="label_tenHang_GIGABYTE" class="me-1 btn btn-filter 
                    <?php if(checkTenHang("GIGABYTE")) echo 'active'?>">GIGABYTE</label>                        
                    <input form="search_box" type="checkbox" name="tenHang[]" id="tenHang_GIGABYTE" value="GIGABYTE" <?php if(checkTenHang("GIGABYTE")) echo'checked' ?> >

                    <label for="tenHang_HP" onclick="chonHoacHuyChon('label_tenHang_HP')" id="label_tenHang_HP" class="me-1 btn btn-filter 
                    <?php if(checkTenHang("HP")) echo 'active'?>">HP</label>                        
                    <input form="search_box" type="checkbox" name="tenHang[]" id="tenHang_HP" value="HP" <?php if(checkTenHang("HP")) echo'checked' ?> >

                    <label for="tenHang_LG" onclick="chonHoacHuyChon('label_tenHang_LG')" id="label_tenHang_LG" class="me-1 btn btn-filter 
                    <?php if(checkTenHang("LG")) echo 'active'?>">LG</label>                        
                    <input form="search_box" type="checkbox" name="tenHang[]" id="tenHang_LG" value="LG" <?php if(checkTenHang("LG")) echo'checked' ?> >

                    <label for="tenHang_LENOVO" onclick="chonHoacHuyChon('label_tenHang_LENOVO')" id="label_tenHang_LENOVO" class="me-1 btn btn-filter 
                    <?php if(checkTenHang("LENOVO")) echo 'active'?>">LENOVO</label>                        
                    <input form="search_box" type="checkbox" name="tenHang[]" id="tenHang_LENOVO" value="LENOVO" <?php if(checkTenHang("LENOVO")) echo'checked' ?> >

                    <label for="tenHang_MICROSOFT" onclick="chonHoacHuyChon('label_tenHang_MICROSOFT')" id="label_tenHang_MICROSOFT" class="me-1 btn btn-filter 
                    <?php if(checkTenHang("MICROSOFT")) echo 'active'?>">MICROSOFT</label>                        
                    <input form="search_box" type="checkbox" name="tenHang[]" id="tenHang_MICROSOFT" value="MICROSOFT" <?php if(checkTenHang("MICROSOFT")) echo'checked' ?> > 

                    <label for="tenHang_MSI" onclick="chonHoacHuyChon('label_tenHang_MSI')" id="label_tenHang_MSI" class="me-1 btn btn-filter 
                    <?php if(checkTenHang("MSI")) echo 'active'?>">MSI</label>                        
                    <input form="search_box" type="checkbox" name="tenHang[]" id="tenHang_MSI" value="MSI" <?php if(checkTenHang("MSI")) echo'checked' ?> >
                    
                </div>
            </div>
            <!-- Lọc màu sắc -->
            <div class="row mb-3">
                <div class="col-2 d-flex align-items-end"><p class="h6">Màu sắc: </p></div>
                <div class="col-10 d-flex ps-0 align-items-center">
                    <label for="mauSac_trang" onclick="chonHoacHuyChon('label_mauSac_trang')" id="label_mauSac_trang" class="me-1 btn btn-filter 
                    <?php if(checkMauSac("trắng")) echo 'active'?>">Trắng</label>                        
                    <input form="search_box" type="checkbox" name="mauSac[]" id="mauSac_trang" value="trắng" <?php if(checkMauSac("trắng")) echo'checked' ?> >

                    <label for="mauSac_bac" onclick="chonHoacHuyChon('label_mauSac_bac')" id="label_mauSac_bac" class="me-1 btn btn-filter 
                    <?php if(checkMauSac("bạc")) echo 'active'?>">Bạc</label>                        
                    <input form="search_box" type="checkbox" name="mauSac[]" id="mauSac_bac" value="bạc" <?php if(checkMauSac("bạc")) echo'checked' ?> >

                    <label for="mauSac_den" onclick="chonHoacHuyChon('label_mauSac_xam')" id="label_mauSac_xam" class="me-1 btn btn-filter 
                    <?php if(checkMauSac("xám")) echo 'active'?>">Xám</label>                        
                    <input form="search_box" type="checkbox" name="mauSac[]" id="mauSac_xam" value="xám" <?php if(checkMauSac("xám")) echo'checked' ?> >
                
                    <label for="mauSac_den" onclick="chonHoacHuyChon('label_mauSac_den')" id="label_mauSac_den" class="me-1 btn btn-filter 
                    <?php if(checkMauSac("đen")) echo 'active'?>">Đen</label>                        
                    <input form="search_box" type="checkbox" name="mauSac[]" id="mauSac_den" value="đen" <?php if(checkMauSac("đen")) echo'checked' ?> >

                </div>
            </div>
            <!-- Lọc CPU -->
            <div class="row mb-3">
                <div class="col-2 d-flex align-items-end"><p class="h6">CPU:</p></div>
                <div class="col-10 d-flex ps-0 align-items-center">
                    <label for="cpu_i3" onclick="chonHoacHuyChon('label_cpu_i3')" id="label_cpu_i3" class="me-1 btn btn-filter 
                    <?php if(checkCPU("Core i3")) echo 'active'?>">Core i3</label>                        
                    <input form="search_box" type="checkbox" name="CPU[]" id="cpu_i3" value="Core i3" <?php if(checkCPU("Core i3")) echo'checked' ?> >
                    
                    <label for="cpu_i5" onclick="chonHoacHuyChon('label_cpu_i5')" id="label_cpu_i5" class="me-1 btn btn-filter 
                    <?php if(checkCPU("Core i5")) echo 'active'?>">Core i5</label>                        
                    <input form="search_box" type="checkbox" name="CPU[]" id="cpu_i5" value="Core i5" <?php if(checkCPU("Core i5")) echo'checked' ?> >
                    
                    <label for="cpu_i7" onclick="chonHoacHuyChon('label_cpu_i7')" id="label_cpu_i7" class="me-1 btn btn-filter 
                    <?php if(checkCPU("Core i7")) echo 'active'?>">Core i7</label>                        
                    <input form="search_box" type="checkbox" name="CPU[]" id="cpu_i7" value="Core i7" <?php if(checkCPU("Core i7")) echo'checked' ?> >
                    
                    <label for="cpu_i9" onclick="chonHoacHuyChon('label_cpu_i9')" id="label_cpu_i9" class="me-1 btn btn-filter 
                    <?php if(checkCPU("Core i9")) echo 'active'?>">Core i9</label>                        
                    <input form="search_box" type="checkbox" name="CPU[]" id="cpu_i9" value="Core i9" <?php if(checkCPU("Core i9")) echo'checked' ?> >
                    
                    <label for="cpu_r3" onclick="chonHoacHuyChon('label_cpu_r3')" id="label_cpu_r3" class="me-1 btn btn-filter 
                    <?php if(checkCPU("Ryzen 3")) echo 'active'?>">Ryzen 3</label>                        
                    <input form="search_box" type="checkbox" name="CPU[]" id="cpu_r3" value="Ryzen 3" <?php if(checkCPU("Ryzen 3")) echo'checked' ?> >
                    
                    <label for="cpu_r5" onclick="chonHoacHuyChon('label_cpu_r5')" id="label_cpu_r5" class="me-1 btn btn-filter 
                    <?php if(checkCPU("Ryzen 5")) echo 'active'?>">Ryzen 5</label>                        
                    <input form="search_box" type="checkbox" name="CPU[]" id="cpu_r5" value="Ryzen 5" <?php if(checkCPU("Ryzen 5")) echo'checked' ?> >
                    
                    <label for="cpu_r7" onclick="chonHoacHuyChon('label_cpu_r7')" id="label_cpu_r7" class="me-1 btn btn-filter 
                    <?php if(checkCPU("Ryzen 7")) echo 'active'?>">Ryzen 7</label>                        
                    <input form="search_box" type="checkbox" name="CPU[]" id="cpu_r7" value="Ryzen 7" <?php if(checkCPU("Ryzen 7")) echo'checked' ?> >
                    
                    <label for="cpu_r9" onclick="chonHoacHuyChon('label_cpu_r9')" id="label_cpu_r9" class="me-1 btn btn-filter 
                    <?php if(checkCPU("Ryzen 9")) echo 'active'?>">Ryzen 9</label>                        
                    <input form="search_box" type="checkbox" name="CPU[]" id="cpu_r9" value="Ryzen 9" <?php if(checkCPU("Ryzen 9")) echo'checked' ?> >
                </div>
            </div>
            <!-- Lọc RAM -->
            <div class="row mb-3">
                <div class="col-2 d-flex align-items-end"><p class="h6">Dung lượng RAM: </p></div>
                <div class="col-10 d-flex ps-0 align-items-center">
                    <label for="ram_4gb" onclick="chonHoacHuyChon('label_ram_4gb')" id="label_ram_4gb" class="me-1 btn btn-filter 
                    <?php if(checkRAM("4")) echo 'active'?>">4 GB</label>                        
                    <input form="search_box" type="checkbox" name="RAM[]" id="ram_4gb" value="4" <?php if(checkRAM("4")) echo'checked' ?> >

                    <label for="ram_8gb" onclick="chonHoacHuyChon('label_ram_8gb')" id="label_ram_8gb" class="me-1 btn btn-filter 
                    <?php if(checkRAM("8")) echo 'active'?>">8 GB</label>                        
                    <input form="search_box" type="checkbox" name="RAM[]" id="ram_8gb" value="8" <?php if(checkRAM("8")) echo'checked' ?> >

                    <label for="ram_16gb" onclick="chonHoacHuyChon('label_ram_16gb')" id="label_ram_16gb" class="me-1 btn btn-filter 
                    <?php if(checkRAM("16")) echo 'active'?>">16 GB</label>                        
                    <input form="search_box" type="checkbox" name="RAM[]" id="ram_16gb" value="16" <?php if(checkRAM("16")) echo'checked' ?> >

                    <label for="ram_32gb" onclick="chonHoacHuyChon('label_ram_32gb')" id="label_ram_32gb" class="me-1 btn btn-filter 
                    <?php if(checkRAM("32")) echo 'active'?>">32 GB</label>                        
                    <input form="search_box" type="checkbox" name="RAM[]" id="ram_32gb" value="32" <?php if(checkRAM("32")) echo'checked' ?> >

                    <label for="ram_64gb" onclick="chonHoacHuyChon('label_ram_64gb')" id="label_ram_64gb" class="me-1 btn btn-filter 
                    <?php if(checkRAM("64")) echo 'active'?>">64 GB</label>                        
                    <input form="search_box" type="checkbox" name="RAM[]" id="ram_64gb" value="64" <?php if(checkRAM("64")) echo'checked' ?> >

                </div>
            </div>
            <!-- Lọc khoảng giá -->
            <div class="row mb-2">
                <div class="col-2 d-flex align-items-center"><p class="h6">Khoảng giá: </p></div>
                <div class="col-10 d-flex ps-0 align-items-center">
                    <input form="search_box" type="number" class="form-control d-inline-block" name="minPrice" min="0" placeholder="Từ" value="<?php echo $minPrice?>" style="width: 100px; ">
                    <p class="d-inline-block fw-bold mx-2" >~</p>
                    <input form="search_box" type="number" class="form-control d-inline-block" name="maxPrice" min="0" placeholder="Đến" value="<?php echo $maxPrice?>" style="width: 100px; " >
                </div>
            </div>
            <div class="col offset-md-2">
                <button form="search_box" type="submit" class="me-1 btn btn-filter">Tìm kiếm</button>
            </div>
        </div>
    </div>

    <!-- Hien san pham -->
    <div class="row mb-3 gy-4">
        <?php

        $sanPhamStart = ($trangHienTai - 1) * MAX_QUANTITY; 
        $sanPhamEnd = min($trangHienTai * MAX_QUANTITY, count($danhSachSanPham));

        for($i=$sanPhamStart; $i<$sanPhamEnd; $i++) {
            echo '
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card" style="width: 100%;">
                    <img src="'.$danhSachSanPham[$i]->getAnh().'" class="card-img-top" alt="Core item1">
                    <div class="card-body">
                        <h5 class="card-title" style="height: 72px;">'.$danhSachSanPham[$i]->getTenSP().'</h5>
                        <p class="card-text mb-0 text-decoration-line-through">'.$danhSachSanPham[$i]->xuLyGia().' đ</p>
                        <p class="card-text fs-5">'.$danhSachSanPham[$i]->xuLyGiaKhuyenMai().' đ</p>
                        <a href="./product.php?id='.$danhSachSanPham[$i]->getMaSP().'" class="btn btn-primary rounded" style="background-color: var(--third-color)">Mua ngay</a>
                    </div>
                </div>
            </div>';
        }

        ?>
        <!-- <div class="col-6 col-md-4 col-lg-3">
            <div class="card" style="width: 100%;">
                <img src="./assets/image/product/item1.png" class="card-img-top" alt="Core item1">
                <div class="card-body">
                    <h5 class="card-title">Laptop Gaming Acer Aspire 7</h5>
                    <p class="card-text mb-0 text-decoration-line-through">19,990,000₫</p>
                    <p class="card-text fs-5">16,990,000₫</p>
                    <a href="#" class="btn btn-primary rounded-pill" style="background-color: var(--third-color)">Mua ngay</a>
                </div>
            </div>
        </div> -->
    </div>

    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php 
                $queryString = '';
                if(isset($_GET)) {
                    foreach($_GET as $key=>$value) {
                        if($key == 'p') continue;
                        if(is_array($value)) {
                            foreach($value as $valueOfValue) {
                                $queryString .= $key."[]=".$valueOfValue."&";
                            }
                        } else {
                            $queryString .= $key."=".$value."&";
                        }
                    }
                }
                if($soTrang==0) {
                    echo '<div class="p-5 mt-5">
                    <div class="d-flex justify-content-center">
                        <img class="" alt="" src="https://firebasestorage.googleapis.com/v0/b/mongcaifood.appspot.com/o/no-products-found.png?alt=media&amp;token=2f22ae28-6d48-49a7-a36b-e1a696618f9c" loading="lazy" decoding="async">
                    </div> <br>
                    <div class="d-flex justify-content-center">Không tìm thấy sản phẩm nào</div>
                </div> ';}
                if($soTrang>1) {
                    echo '<li class="page-item ';
                    if($trangHienTai<=1) echo 'disabled';
                    echo'">
                        <a class="page-link" href="?'.$queryString.'p='.($trangHienTai-1).'" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>';

                    for($i=1; $i<=$soTrang; $i++) {
                        echo'<li class="page-item ';
                        if($trangHienTai == $i) echo 'active';
                        echo '"><a class="page-link" href="?'.$queryString.'p='.$i.'">'.$i.'</a></li>';
                    }
                    
                    echo '<li class="page-item ';
                    if($trangHienTai >= $soTrang) echo 'disabled';
                    echo'">
                        <a class="page-link" href="?'.$queryString.'p='.($trangHienTai+1).'" aria-label="Previous">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</div>

<script>
    function chonHoacHuyChon(id) {
        btn = document.getElementById(id);
        if (btn.classList.contains('active'))   btn.classList.remove("active");
        else btn.classList.add("active");
    }
</script>

<?php include "./footer.php"?>

