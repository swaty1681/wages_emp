
$(document).ready(function () {
    init();
});

var extras = {
    'epf_percent': 13,
    'esi_percent': 3.25,
    'sc_percent': 10,
    'bonus_percent': 8.33,
    'gst_percent': 18,
    'dress_allowance': 100,
    'duration': 8,
    'days': 1
};

var includes = {
    'epf': true,
    'esi': true,
    'bonus': true,
    'dress': true,
    'gst': true
};

const getPostTypes = () => {
    return $("#wages_table_001 tr[id^='post-type-']");
}

const round_off = (num) => {
    return parseFloat(Math.round((num + Number.EPSILON) * 100) / 100);
}

const float = (num) => {
    return parseFloat(num);
}

const int = (num) => {
    return parseInt(num);
}

const by_percent = (basic, scheme) => {
    return round_off(basic * (getExtras(scheme + '_percent') / 100) * getExtras('duration') * getExtras('days'));
}

const update_col = (current_post, scheme, value) => {
    $(current_post + ' [data-id="' + scheme + '"]').html(value);
}

const calc_expected_total = (current_basic, epf, esi, sc, bonus, gst) => {
    return round_off(current_basic * getExtras('duration') * getExtras('days') + epf + esi + sc + bonus + gst + float(getExtras('dress_allowance')));
}

const calc_actual_total = (current_basic, epf, esi, sc, bonus, gst) => {
    var actual_total = current_basic * getExtras('duration') * getExtras('days') + sc;
    if (getIncludes('epf')) {
        actual_total += epf;
    }
    if (getIncludes('esi')) {
        actual_total += esi;
    }
    if (getIncludes('bonus')) {
        actual_total += bonus;
    }
    if (getIncludes('gst')) {
        actual_total += gst;
    }
    if (getIncludes('dress')) {
        actual_total += getExtras('dress_allowance');
    }
    return round_off(actual_total);
}

function getExtras(value_name) {
    return extras[value_name];
}

function setExtras(value_name, value) {

    var post_rows = getPostTypes();

    if (value_name == 'duration' || value_name == 'days') {
        for (let index = 0; index < post_rows.length; index++) {
            var basic = $('#' + element_id + ' [data-id="basic"]');
            var current_basic = basic.val() / getExtras(value_name);
            const element = post_rows[index];
            var element_id = $(element).attr('id');
            basic.val(current_basic * value);
            // calculate(post_row_no);
        }
    }

    extras[value_name] = float(value);

    for (let index = 0; index < post_rows.length; index++) {
        const element = post_rows[index];
        var element_id = $(element).attr('id');
        var post_row_no = element_id.replace('post-type-', '');
        calculate(post_row_no);
    }
}


function setIncludes(value_name) {
    includes[value_name] = !getIncludes(value_name);
    var post_rows = getPostTypes();
    for (let index = 0; index < post_rows.length; index++) {
        const element = post_rows[index];
        var element_id = $(element).attr('id');
        var post_row_no = element_id.replace('post-type-', '');
        calculate(post_row_no);
    }
}

function getIncludes(value_name) {
    return includes[value_name];
}

function init() {
    var post_rows = getPostTypes();

    for (let index = 0; index < post_rows.length; index++) {
        const element = post_rows[index];
        var element_id = $(element).attr('id');
        var post_row_no = element_id.replace('post-type-', '');
        calculate(post_row_no);
    }
}

function calculate(index) {

    // get the minimum price for extras calculation
    if (index % 2 == 0) {
        var current_post = '#post-type-' + (index - 1);
    } else {
        var current_post = '#post-type-' + index;
        udpate_minimum_wages(index);
    }
    var current_basic = $(current_post + ' [data-id="basic"]').val();
    current_basic = round_off(float(current_basic));
    current_basic = current_basic / getExtras('duration');
    current_basic = current_basic / getExtras('days');

    // reset the current post for html update
    current_post = '#post-type-' + index;

    // epf
    var epf = by_percent(current_basic, 'epf');
    update_col(current_post, 'epf', epf);

    // epf
    var esi = by_percent(current_basic, 'esi');
    update_col(current_post, 'esi', esi);

    // bonus
    var bonus = by_percent(current_basic, 'bonus');
    update_col(current_post, 'bonus', bonus);

    // gst
    var gst = by_percent(current_basic, 'gst');
    update_col(current_post, 'gst', gst);

    // dress allowance
    var dress = getExtras('dress_allowance');
    update_col(current_post, 'dress', dress);

    // get back to the total rate for sc calculation
    if (index % 2 == 0) {
        var current_post = '#post-type-' + index;
        var current_basic = $(current_post + ' [data-id="basic"]').val();
        current_basic = round_off(float(current_basic));
        current_basic = current_basic / getExtras('duration');
        current_basic = current_basic / getExtras('days');
    }

    // sc
    var sc = by_percent(current_basic, 'sc');
    update_col(current_post, 'sc', sc);

    // expected_total
    var expected_total = calc_expected_total(current_basic, epf, esi, sc, bonus, gst);
    update_col(current_post, 'expected_total', expected_total);

    // actual_total
    var actual_total = calc_actual_total(current_basic, epf, esi, sc, bonus, gst);
    update_col(current_post, 'actual_total', actual_total);
}

function udpate_minimum_wages(index) {

    if (index % 2 == 1) {
        var current_post = '#post-type-' + index;
        var current_basic = $(current_post + ' [data-id="basic"]').val();
        current_basic = round_off(float(current_basic));
        // current_basic = current_basic/getExtras('duration');
        // current_basic = current_basic/getExtras('days');

        var next_post = '#post-type-' + (index + 1);
        var next_basic = $(next_post + ' [data-id="basic"]').val();
        next_basic = round_off(float(next_basic));
        // next_basic = next_basic/getExtras('duration');
        // next_basic = next_basic/getExtras('days');

        // if (next_basic < current_basic) {
            $(next_post + ' [data-id="basic"]').val(current_basic);
            $(next_post + ' [data-id="basic"]').attr('min', current_basic);
            calculate(index + 1);
        // }
    }
}


// $('#wages_table_001')
function add_new_post_type() {

    var post_type = $('#new-post-type-input');
    var post_mw = $('#new-post-mw-input');
    var table = $('#wages_table_001');

    if(post_type.val() == '' || post_mw.val() == ''){
        alert('All Fields required!');
        return;
    }

    // add rows
    // odd row
    var odd_row = makeid(6, 'odd');
    var odd_row_html = html_rows(post_type.val(), odd_row, post_mw.val(), 0);
    table.append(odd_row_html);
    calculate(odd_row);
    // even row
    var even_row = int(odd_row)+1;
    var even_row_html = html_rows('&#8627;', even_row, post_mw.val(), post_mw.val());
    table.append(even_row_html);
    calculate(even_row);


    post_type.val('');
    post_mw.val('');
    $('#new-post-modal-close').click();
}


function html_rows(post_type, post_id, basic, basic_min) {
    var html = '<tr id="post-type-'+post_id+'">';
    html += '<td>'+post_type+'</td>';
    html += '<td>';
    html += '    <div class="input-group">';
    html += '        <div class="input-group-prepend">';
    html += '            <span class="input-group-text" id="basic-addon2">₹</span>';
    html += '        </div>';
    html += '        <input type="number" class="form-control" data-id="basic" min="'+basic_min+'" value="'+basic+'" onchange="calculate('+post_id+')" onkeyup="calculate('+post_id+')">';
    html += '    </div>';
    html += '</td>';
    html += '<td>₹<span data-id="epf"></span></td>';
    html += '<td>₹<span data-id="esi"></span></td>';
    html += '<td>₹<span data-id="sc"></span></td>';
    html += '<td>₹<span data-id="bonus"></span></td>';
    html += '<td>₹<span data-id="dress"></span></td>';
    html += '<td>₹<span data-id="gst"></span></td>';
    html += '<td>₹<span data-id="expected_total"></span></td>';
    html += '<td>₹<span data-id="actual_total"></span></td>';
    html += '</tr>';

    return html;
}



function makeid(length, type) {
    var result = '';
    var characters;
    switch (type) {
        case 'even':
            characters = '02468'
            break;
        case 'even':
            characters = '13579'
            break;
        default:
            characters = '0123456789'
            break;
    }
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}