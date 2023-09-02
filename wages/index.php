<?php
    session_start();
    if(!isset($_SESSION['wages_calc_admin'])){
        header('location: ../login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="robots" content="noindex,nofollow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="referrer" content="no-referrer">
    <title>Wages Calc</title>
    <link rel="icon" href="https://lyncdigit.com/wp-content/uploads/2021/11/logo-icon-png-300x300.png" sizes="192x192" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        tr input {
            min-width: 100px;
        }
        body{
            position: relative;
        }
        .logout{
            position: absolute;
            top: 10px;
            right: 20px;
        }
    </style>
</head>

<body>

    <?php
    include_once "modals.php";
    ?>

    <button class="btn btn-primary logout" onclick="window.location.href='../logout.php'">Logout</button>

    <div class="container-fluid mt-2">

        <h2>Wages Calc</h2>

        <!-- percentages -->
        <div class="row mb-4">
            <div class="col-4 mb-2">
                <label for="epf_percent">EPF</label>
                <div class="input-group">
                    <input type="number" class="form-control" min="0" value="13" id="epf_percent" onchange="setExtras('epf_percent', this.value)" onkeyup="setExtras('epf_percent', this.value)">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">%</span>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-2">
                <label for="esi_percent">ESI</label>
                <div class="input-group">
                    <input type="number" class="form-control" min="0" value="3.25" id="esi_percent" onchange="setExtras('esi_percent', this.value)" onkeyup="setExtras('esi_percent', this.value)">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">%</span>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-2">
                <label for="sc_percent">SC</label>
                <div class="input-group">
                    <input type="number" class="form-control" min="0" value="10" id="sc_percent" onchange="setExtras('sc_percent', this.value)" onkeyup="setExtras('sc_percent', this.value)">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">%</span>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-2">
                <label for="bonus_percent">Bonus</label>
                <div class="input-group">
                    <input type="number" class="form-control" min="0" value="8.33" id="bonus_percent" onchange="setExtras('bonus_percent', this.value)" onkeyup="setExtras('bonus_percent', this.value)">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">%</span>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-2">
                <label for="gst_percent">GST</label>
                <div class="input-group">
                    <input type="number" class="form-control" min="0" value="18" id="gst_percent" onchange="setExtras('gst_percent', this.value)" onkeyup="setExtras('gst_percent', this.value)">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">%</span>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-2">
                <label for="dress_allowance">Dress Allowance</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2">₹</span>
                    </div>
                    <input type="number" class="form-control" min="0" value="100" id="dress_allowance" onchange="setExtras('dress_allowance', this.value)" onkeyup="setExtras('dress_allowance', this.value)">
                </div>
            </div>
            <div class="col-4 mb-2">
                <label for="exampleInputPassword1">Duration</label>
                <div class="input-group">
                    <select class="form-control" onchange="setExtras('duration', this.value)">
                        <option value="1">1 hour</option>
                        <option value="8" selected>8 hours</option>
                        <option value="12">12 hours</option>
                    </select>
                </div>
            </div>
            <div class="col-4 mb-2">
                <label for="exampleInputPassword1">No of Days</label>
                <div class="input-group">
                    <select class="form-control" onchange="setExtras('days', this.value)">
                        <option value="1" selected>1 day</option>
                        <option value="26">26 days</option>
                        <option value="30">30 days</option>
                    </select>
                </div>
            </div>
            <div class="form-row align-items-center">
                <div class="col-auto my-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="epf_checkbox" onchange="setIncludes('epf')" checked>
                        <label class="form-check-label" for="epf_checkbox">
                            EPF
                        </label>
                    </div>
                </div>
                <div class="col-auto my-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="esi_checkbox" onchange="setIncludes('esi')" checked>
                        <label class="form-check-label" for="esi_checkbox">
                            ESI
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="bonus_checkbox" onchange="setIncludes('bonus')" checked>
                        <label class="form-check-label" for="bonus_checkbox">
                            Bonus
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="dress_checkbox" onchange="setIncludes('dress')" checked>
                        <label class="form-check-label" for="dress_checkbox">
                            Dress
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="gst_checkbox" onchange="setIncludes('gst')" checked>
                        <label class="form-check-label" for="gst_checkbox">
                            GST
                        </label>
                    </div>
                </div>
            </div>

        </div>

        <!-- percentages -->

        <table id="wages_table_001" class="table table-striped table-responsive-sm table-responsive-md table-responsive-lg">
            <tr>
                <th>Post Type</th>
                <th>Basic</th>
                <th>EPF</th>
                <th>ESI</th>
                <th>SC</th>
                <th>Bonus</th>
                <th>Dress</th>
                <th>GST</th>
                <th>Expected Total</th>
                <th>Actual Total</th>
            </tr>

            <!-- unskilled -->
            <tr id="post-type-1">
                <td>Unskilled</td>
                <td>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2">₹</span>
                        </div>
                        <input type="number" class="form-control" data-id="basic" min="0" value="326" onchange="calculate(1)" onkeyup="calculate(1)">
                    </div>
                </td>
                <td>₹<span data-id="epf">47.58</span></td>
                <td>₹<span data-id="esi">11.90</span></td>
                <td>₹<span data-id="sc">36.60</span></td>
                <td>₹<span data-id="bonus">30.49</span></td>
                <td>₹<span data-id="dress">100</span></td>
                <td>₹<span data-id="gst">65.88</span></td>
                <td>₹<span data-id="expected_total">658.45</span></td>
                <td>₹<span data-id="actual_total">658.45</span></td>
            </tr>
            <tr id="post-type-2">
                <td>&#8627;</td>
                <td>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2">₹</span>
                        </div>
                        <input type="number" class="form-control" data-id="basic" min="326" value="326" onchange="calculate(2)" onkeyup="calculate(2)">
                    </div>
                </td>
                <td>₹<span data-id="epf">47.58</span></td>
                <td>₹<span data-id="esi">11.90</span></td>
                <td>₹<span data-id="sc">36.60</span></td>
                <td>₹<span data-id="bonus">30.49</span></td>
                <td>₹<span data-id="dress">100</span></td>
                <td>₹<span data-id="gst">65.88</span></td>
                <td>₹<span data-id="expected_total">658.45</span></td>
                <td>₹<span data-id="actual_total">658.45</span></td>
            </tr>
            <!-- unskilled -->

            <!-- semiskilled -->
            <tr id="post-type-3">
                <td>Semi Skilled</td>
                <td>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2">₹</span>
                        </div>
                        <input type="number" class="form-control" data-id="basic" min="0" value="366" onchange="calculate(3)" onkeyup="calculate(3)">
                    </div>
                </td>
                <td>₹<span data-id="epf">47.58</span></td>
                <td>₹<span data-id="esi">11.90</span></td>
                <td>₹<span data-id="sc">36.60</span></td>
                <td>₹<span data-id="bonus">30.49</span></td>
                <td>₹<span data-id="dress">100</span></td>
                <td>₹<span data-id="gst">65.88</span></td>
                <td>₹<span data-id="expected_total">658.45</span></td>
                <td>₹<span data-id="actual_total">658.45</span></td>
            </tr>
            <tr id="post-type-4">
                <td>&#8627;</td>
                <td>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2">₹</span>
                        </div>
                        <input type="number" class="form-control" data-id="basic" min="326" value="366" onchange="calculate(4)" onkeyup="calculate(4)">
                    </div>
                </td>
                <td>₹<span data-id="epf">47.58</span></td>
                <td>₹<span data-id="esi">11.90</span></td>
                <td>₹<span data-id="sc">36.60</span></td>
                <td>₹<span data-id="bonus">30.49</span></td>
                <td>₹<span data-id="dress">100</span></td>
                <td>₹<span data-id="gst">65.88</span></td>
                <td>₹<span data-id="expected_total">658.45</span></td>
                <td>₹<span data-id="actual_total">658.45</span></td>
            </tr>
            <!-- semi skilled -->

            <!-- skilled -->
            <tr id="post-type-5">
                <td>Skilled</td>
                <td>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2">₹</span>
                        </div>
                        <input type="number" class="form-control" data-id="basic" min="0" value="416" onchange="calculate(5)" onkeyup="calculate(5)">
                    </div>
                </td>
                <td>₹<span data-id="epf">47.58</span></td>
                <td>₹<span data-id="esi">11.90</span></td>
                <td>₹<span data-id="sc">36.60</span></td>
                <td>₹<span data-id="bonus">30.49</span></td>
                <td>₹<span data-id="dress">100</span></td>
                <td>₹<span data-id="gst">65.88</span></td>
                <td>₹<span data-id="expected_total">658.45</span></td>
                <td>₹<span data-id="actual_total">658.45</span></td>
            </tr>
            <tr id="post-type-6">
                <td>&#8627;</td>
                <td>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2">₹</span>
                        </div>
                        <input type="number" class="form-control" data-id="basic" min="416" value="416" onchange="calculate(6)" onkeyup="calculate(6)">
                    </div>
                </td>
                <td>₹<span data-id="epf">47.58</span></td>
                <td>₹<span data-id="esi">11.90</span></td>
                <td>₹<span data-id="sc">36.60</span></td>
                <td>₹<span data-id="bonus">30.49</span></td>
                <td>₹<span data-id="dress">100</span></td>
                <td>₹<span data-id="gst">65.88</span></td>
                <td>₹<span data-id="expected_total">658.45</span></td>
                <td>₹<span data-id="actual_total">658.45</span></td>
            </tr>
            <!-- skilled -->

            <!-- highly skilled -->
            <tr id="post-type-7">
                <td>Highly Skilled</td>
                <td>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2">₹</span>
                        </div>
                        <input type="number" class="form-control" data-id="basic" min="0" value="476" onchange="calculate(7)" onkeyup="calculate(7)">
                    </div>
                </td>
                <td>₹<span data-id="epf">47.58</span></td>
                <td>₹<span data-id="esi">11.90</span></td>
                <td>₹<span data-id="sc">36.60</span></td>
                <td>₹<span data-id="bonus">30.49</span></td>
                <td>₹<span data-id="dress">100</span></td>
                <td>₹<span data-id="gst">65.88</span></td>
                <td>₹<span data-id="expected_total">658.45</span></td>
                <td>₹<span data-id="actual_total">658.45</span></td>
            </tr>
            <tr id="post-type-8">
                <td>&#8627;</td>
                <td>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2">₹</span>
                        </div>
                        <input type="number" class="form-control" data-id="basic" min="476" value="476" onchange="calculate(8)" onkeyup="calculate(8)">
                    </div>
                </td>
                <td>₹<span data-id="epf">47.58</span></td>
                <td>₹<span data-id="esi">11.90</span></td>
                <td>₹<span data-id="sc">36.60</span></td>
                <td>₹<span data-id="bonus">30.49</span></td>
                <td>₹<span data-id="dress">100</span></td>
                <td>₹<span data-id="gst">65.88</span></td>
                <td>₹<span data-id="expected_total">658.45</span></td>
                <td>₹<span data-id="actual_total">658.45</span></td>
            </tr>
            <!-- highly skilled -->

        </table>
        <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#add-new-post-modal">New Post Type</button>
    </div>

    <script src="./script.js"></script>

    <footer class="text-center text-lg-start bg-light text-muted">
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            Copyright © <?= date('Y') ?> Sentinel Workforce Pvt Ltd | All Rights Reserved | Powered By
            <a class="text-reset fw-bold" href="https://www.lyncdigit.com/" target="_blank">Lyncdigit</a>
        </div>
    </footer>


</body>

</html>