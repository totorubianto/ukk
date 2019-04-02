<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/style.css">
<?php foreach ($rutes->result() as $row): ?>
<?php echo $row->tujuan ?>

<?php endforeach; ?>
<form method="post" action="addPemesanan">
    <input name="kode_pemesanan" type="hidden" value="<?php echo uniqid() ?>">
    <input name="tempat_pemesanan" type="text" placeholder="tempat pemesanan">
    <select name="" id="">
        <option value="jakarta">jakarta</option>
        <option value="Jogja">Jogja</option>
        <option value="Wangon">Wangon</option>
        <option value="Kalimantan Timur">Kalimantan Timur</option>
        <option value="Kalimantan barat">Kalimantan barat</option>
    </select>

    <!-- data penumpang-->


    <!-- -->

    <label>Choose Seat</label>

    <div class="bus seat2-2 border-0 p-0">
        <div class="seat-row-1">
            <ol class="seats">
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-1" value="1"
                        required="" type="radio">
                    <label for="seat-radio-1-1">
                        1 </label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-2" value="2"
                        required="" type="radio">
                    <label for="seat-radio-1-2">
                        2 </label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-3" value="3"
                        required="" type="radio">
                    <label for="seat-radio-1-3">
                        3 </label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-4" value="4"
                        required="" type="radio">
                    <label for="seat-radio-1-4">
                        4 </label>
                </li>
            </ol>
        </div>
        <div class="seat-row-2">
            <ol class="seats">
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-5" value="5"
                        required="" type="radio">
                    <label for="seat-radio-1-5">
                        5 </label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-6" value="6"
                        required="" type="radio">
                    <label for="seat-radio-1-6">
                        6 </label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-7" value="7"
                        required="" type="radio">
                    <label for="seat-radio-1-7">
                        7 </label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-8" value="8"
                        required="" type="radio">
                    <label for="seat-radio-1-8">
                        8 </label>
                </li>
            </ol>
        </div>
        <div class="seat-row-3">
            <ol class="seats">
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-9" value="9"
                        required="" type="radio">
                    <label for="seat-radio-1-9">
                        9 </label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-10" value="10"
                        required="" type="radio">
                    <label for="seat-radio-1-10">
                        10 </label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-11" value="11"
                        required="" type="radio">
                    <label for="seat-radio-1-11">
                        11 </label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-12" value="12"
                        required="" type="radio">
                    <label for="seat-radio-1-12">
                        12 </label>
                </li>
            </ol>
        </div>
        <div class="seat-row-4">
            <ol class="seats">
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-13" value="13"
                        required="" type="radio" disabled>
                    <label for="seat-radio-1-13">
                        13 </label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-14" value="14"
                        required="" type="radio">
                    <label for="seat-radio-1-14">
                        14 </label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-15" value="15"
                        required="" type="radio">
                    <label for="seat-radio-1-15">
                        15 </label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-16" value="16"
                        required="" type="radio">
                    <label for="seat-radio-1-16">
                        16 </label>
                </li>
            </ol>
        </div>
        <div class="seat-row-5">
            <ol class="seats">
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-17" value="17"
                        required="" type="radio">
                    <label for="seat-radio-1-17">
                        17 </label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-18" value="18"
                        required="" type="radio">
                    <label for="seat-radio-1-18">
                        18 </label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-19" value="19"
                        required="" type="radio">
                    <label for="seat-radio-1-19">
                        19 </label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-20" value="20"
                        required="" type="radio">
                    <label for="seat-radio-1-20">
                        20 </label>
                </li>
            </ol>
        </div>
        <div class="seat-row-6">
            <ol class="seats">
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-21" value="21"
                        required="" type="radio">
                    <label for="seat-radio-1-21">
                        21 </label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-22" value="22"
                        required="" type="radio">
                    <label for="seat-radio-1-22">
                        22 </label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-23" value="23"
                        required="" type="radio">
                    <label for="seat-radio-1-23">
                        23 </label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-24" value="24"
                        required="" type="radio">
                    <label for="seat-radio-1-24">
                        24 </label>
                </li>
            </ol>
        </div>
        <div class="seat-row-7">
            <ol class="seats">
                <li class="seat">
                    <label for="seat-radio-1-BLANK" style="background: none;"></label>
                </li>
                <li class="seat">
                    <label for="seat-radio-1-BLANK" style="background: none;"></label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-25" value="25"
                        required="" type="radio">
                    <label for="seat-radio-1-25">
                        25 </label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-26" value="26"
                        required="" type="radio">
                    <label for="seat-radio-1-26">
                        26 </label>
                </li>
            </ol>
        </div>
        <div class="seat-row-8">
            <ol class="seats">
                <li class="seat">
                    <label for="seat-radio-1-BLANK" style="background: none;"></label>
                </li>
                <li class="seat">
                    <label for="seat-radio-1-BLANK" style="background: none;"></label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-27" value="27"
                        required="" type="radio">
                    <label for="seat-radio-1-27">
                        27 </label>
                </li>
                <li class="seat">
                    <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-28" value="28"
                        required="" type="radio" disabled>
                    <label for="seat-radio-1-28">
                        28 </label>
                </li>
            </ol>
        </div>
    </div>

    <div class="text-left mt-2">
        <button class="btn btn-primary btn-xs mb-2">Available</button>
        <button class="btn btn-success btn-xs mb-2">Choosen</button>
        <button class="btn btn-danger btn-xs mb-2">Booked</button>
    </div>


</form>