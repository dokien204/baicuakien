<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Thống kê</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div id="piechart_3d" style="height: 500px;"></div>

        <div class="table-responsive">
            <table class="table">
                <thead style="color: red;">
                    <td>Mã Loại</td>
                    <td>Tên Loại Phim</td>
                    <td>Số Lượng Phim</td>
                    <td>Gía Thấp Nhất</td>
                    <td>Gía Cao Nhất</td>
                    <td>Gía Trung Bình</td>
                </thead>
                <?php foreach ($thongkephim as $thongke) : ?>
                    <?php extract($thongke); ?>
                    <tbody>
                        <td><?= $idloai ?></td>
                        <td><?= $tenloai ?></td>
                        <td><?= $soluong ?></td>
                        <td><?= number_format($min, 0, ',', '.') ?></td>
                        <td><?= number_format($max, 0, ',', '.') ?></td>
                        <td><?= number_format($avg, 0, ',', '.') ?></td>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>

    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table">
                <thead style="color: red;">
                    <th>Mã Địa Điểm</th>
                    <th>Tên Địa Điểm</th>
                    <th>Số Lượng Rạp</th>
                    <th>Tên Rạp</th>
                </thead>
                <?php foreach ($thongkediadiem as $thongkedd) : ?>
                    <?php extract($thongkedd); ?>
                    <tbody>
                        <td><?= $iddiadiem ?></td>
                        <td><?= $tendiadiem ?></td>
                        <td><?= $soluong ?></td>
                        <td><?= $tenrap ?></td>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>

    <div id="columnchart_material" style="height: 500px;"></div>

    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table">
                <thead style="color: red;">
                    <th>Tên rạp</th>
                    <th>Tổng doanh thu</th>
                </thead>
                <?php foreach ($thongketientheorap as $thongketp) : ?>
                    <?php extract($thongketp); ?>
                    <tbody>
                        <td><?= $ten_rap ?></td>
                        <td><?= $tong_tien ?></td>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>

    <div id="linechart" style="height: 500px;"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart", "bar"]
        });
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            drawPieChart();
            drawColumnChart();
            drawLineChart();
        }

        function drawPieChart() {
            var data = google.visualization.arrayToDataTable([
                ['Thể loại phim', 'Số lượng'],
                <?php foreach ($thongkephim as $thongke) {
                    extract($thongke);
                    echo "['$tenloai', $soluong],";
                } ?>
            ]);

            var options = {
                title: 'Biểu đồ thống kê số lượng phim',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }

        function drawColumnChart() {
            var data = google.visualization.arrayToDataTable([
                ['Tên Rạp', 'Doanh thu'],
                <?php foreach ($thongketientheorap as $thongketp) {
                    extract($thongketp);
                    echo "['$ten_rap', $tong_tien],";
                } ?>
            ]);

            var options = {
                chart: {
                    title: 'Doanh thu theo rạp',
                    subtitle: 'Năm hiện tại',
                },
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

        function drawLineChart() {
            var data = google.visualization.arrayToDataTable([
                ['Ngày', 'Tiền'],
                <?php foreach ($thongketientheongay as $thongketn) {
                    extract($thongketn);
                    echo "['$ngay', $tong_tien],";
                } ?>
            ]);

            var options = {
                title: 'Biểu đồ tiền theo ngày',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('linechart'));
            chart.draw(data, options);
        }
    </script>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Thống kê bình luận</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table">
                <thead style="color: red;">
                    <td>Mã bình luận</td>
                    <td>Nội dung</td>
                    <td>Khách hàng</td>
                    <td>Phim</td>
                </thead>
                <?php foreach ($thongkebl as $thongkebl) : ?>
                    <?php extract($thongkebl); ?>
                    <tbody>
                        <td><?= $id_bl ?></td>
                        <td><?= $noi_dung ?></td>
                        <td><?= $email ?></td>
                        <td><?= $ten_phim ?></td>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body printableArea">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <address>
                                    <h3> &nbsp;<b class="text-danger">Vé Đã Thanh Toán</b></h3>
                                </address>
                            </div>
                            <div class="pull-right text-right">
                                <address>
                                    <?php
                                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                                    $currentDate = date('Y-m-d');
                                    echo $currentDate; ?>
                                    <p><b>Ngày: </b> <i class="fa fa-calendar"> <?= $currentDate ?> </i> </p>
                                </address>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Khách hàng</th>
                                            <th class="text-center">Tên phim</th>
                                            <th class="text-center">Giờ chiếu</th>
                                            <th class="text-center">Ghế</th>
                                            <th class="text-center">Giá vé</th>
                                            <th class="text-center">Ngày đặt</th>
                                            <th class="text-center">Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($da_thanhtoan as $da_tt) : ?>
                                            <?php
                                            extract($da_tt);
                                            $fm_gia = number_format($tong_tien, 0, ',', '.');
                                            $fm_tong_gia_datt = number_format($tong_tien_ve, 0, ',', '.');
                                            $fm_tb_gia_datt = number_format($tb_giave, 0, ',', '.');
                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $id_ve ?></td>
                                                <td class="text-center"><?= $email ?></td>
                                                <td class="text-center"><?= $ten_phim ?></td>
                                                <td class="text-center"> <?= $gio_chieu ?> </td>
                                                <td class="text-center"> <?= $ds_ghe ?> </td>
                                                <td class="text-center"> <?= $fm_gia ?> </td>
                                                <td class="text-center"> <?= $ngay_dat ?> </td>
                                                <td class="text-center"> <?php if ($trang_thai == 1) {
                                                                                echo "Đã thanh toán";
                                                                            } ?> </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                <p>Tổng giá: <?= $fm_tong_gia_datt ?? "" ?> VND</p>
                                <p>Giá trung bình: : <?= $fm_tb_gia_datt ?? "" ?> VND</p>
                                <hr>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body printableArea">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <address>
                                    <h3> &nbsp;<b class="text-danger">Vé Chưa Thanh Toán</b></h3>
                                </address>
                            </div>
                            <div class="pull-right text-right">
                                <address>
                                    <?php
                                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                                    $currentDate = date('Y-m-d');
                                    echo $currentDate; ?>
                                    <p><b>Ngày: </b> <i class="fa fa-calendar"> <?= $currentDate ?> </i> </p>
                                </address>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Khách hàng</th>
                                            <th class="text-center">Tên phim</th>
                                            <th class="text-center">Giờ chiếu</th>
                                            <th class="text-center">Ghế</th>
                                            <th class="text-center">Giá vé</th>
                                            <th class="text-center">Ngày đặt</th>
                                            <th class="text-center">Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ch_thanhtoan as $ch_tt) : ?>
                                            <?php
                                            extract($ch_tt);
                                            $fm_gia = number_format($tong_tien, 0, ',', '.');
                                            $fm_tong_gia_chtt = number_format($tong_tien_ve_chtt, 0, ',', '.');
                                            $fm_tb_gia_chtt = number_format($tb_giave_chtt, 0, ',', '.');
                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $id_ve ?></td>
                                                <td class="text-center"><?= $email ?></td>
                                                <td class="text-center"><?= $ten_phim ?></td>
                                                <td class="text-center"> <?= $gio_chieu ?> </td>
                                                <td class="text-center"> <?= $ds_ghe ?> </td>
                                                <td class="text-center"> <?= $fm_gia ?> </td>
                                                <td class="text-center"> <?= $ngay_dat ?> </td>
                                                <td class="text-center"> <?php if ($trang_thai == 0) {
                                                                                echo "Chưa thanh toán";
                                                                            } ?> </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                <p>Tổng giá: <?= $fm_tong_gia_chtt ?? "" ?> VND</p>
                                <p>Giá trung bình: : <?= $fm_tb_gia_chtt ?? "" ?> VND</p>
                                <hr>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>