    <style>
        .thumb {
            margin-bottom: 20px;
        }

        #submitButton {
            width: 100px;
            height: 50px;
            margin-top: 20px;
            cursor: not-allowed;
            background-color: #ccc;
            color: #666;
        }

        #submitButton:not([disabled]) {
            cursor: pointer;
            background-color: #28a745;
            color: #fff;
        }

        .ticket-search-form {
            flex-direction: column;
        }
    </style>
    <section style="margin: 30px 0;" class="book-section bg-one">
        <div class="container">
            <form class="ticket-search-form two" method="post" action="index.php?act=ghe">
                <div>
                    <!-- địa điểm -->
                    <div class="form-group">
                        <div class="thumb">
                            <img src="assets/images/movie/city.png" alt="ticket">
                        </div>
                        <span class="type">Địa điểm</span>
                        <input type="hidden" name="id_phim" id="id_phim" value="<?= $id_phim ?>">
                        <select id="id_diadiem" name="id_diadiem" style="color: #000000;" onchange="get_id_dd()">
                            <option value="" disabled hidden selected>Địa Điểm</option>
                            <?php foreach ($list_diadiem as $dia_diem) : ?>
                                <?php extract($dia_diem); ?>
                                <option value="<?= $id_diadiem ?>"><?= $ten_diadiem ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- rạp -->
                    <div class="form-group">
                        <div class="thumb">
                            <img src="assets/images/movie/cinema.png" alt="ticket">
                        </div>
                        <span class="type">Rạp</span>
                        <select id="rap" name="id_rap" style="color: #000000;" onchange="get_id_rap()">

                        </select>
                    </div>
                    <!-- ngày -->
                    <div class="form-group">
                        <div class="thumb">
                            <img src="assets/images/movie/date.png" alt="ticket">
                        </div>
                        <span class="type">Ngày</span>
                        <select id="ngay" name="id_ngaychieu" style="color: #000000;" onchange="get_id_ngay()">

                        </select>
                    </div>
                    <!-- giờ chiếu -->
                    <div class="form-group">
                        <div class="thumb">
                            <img src="assets/images/movie/ticket-tab01.png" alt="ticket">
                        </div>
                        <span class="type">Giờ</span>
                        <select id="gio" name="id_giochieu" style="color: #000000;">
                        </select>
                    </div>
                </div>

                <div style="margin-top: 20px;">
                    <button id="submitButton" style="width: 100px; height: 50px;" type="submit" class="btn btn-outline-success text-center" disabled>
                        Tiếp tục
                    </button>
                </div>
            </form>
        </div>
    </section>

    <script>
        //lấy id dịa điểm slec ra rạp
        function get_id_dd() {
            var id_dd = $("#id_diadiem").val();

            $.ajax({
                type: "POST",
                url: "model/get_rap.php",
                data: {
                    id_diadiem: id_dd
                },
                success: function(response) {
                    $("#rap").html(response);
                }
            });
        }
        //lấy id rap slec ra ngày
        function get_id_rap() {
            var id_rap = $("#rap").val();
            var id_phim = $("#id_phim").val();

            $.ajax({
                type: "POST",
                url: "model/get_ngay.php",
                data: {
                    id_rap: id_rap,
                    id_phim: id_phim
                },

                success: function(response) {
                    $("#ngay").html(response);
                }
            });
        }

        //lấy id ngày slec ra giờ
        function get_id_ngay() {
            var id_ngay = $("#ngay").val();
            var id_phim = $("#id_phim").val();

            $.ajax({
                type: "POST",
                url: "model/get_gio.php",
                data: {
                    id_ngay: id_ngay,
                    id_phim: id_phim
                },
                success: function(response) {
                    $("#gio").html(response);
                }
            });
        }

        function enableSubmitButton() {
            var diaDiem = $("#id_diadiem").val();
            var rap = $("#rap").val();
            var ngayChieu = $("#ngay").val();
            var gioChieu = $("#gio").val();

            if (diaDiem && rap && ngayChieu && gioChieu) {
                $("#submitButton").prop("disabled", false);
            } else {
                $("#submitButton").prop("disabled", true);
            }
        }

        $("#id_diadiem, #rap, #ngay, #gio").change(enableSubmitButton);
    </script>