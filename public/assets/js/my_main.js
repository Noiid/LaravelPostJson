$('#filterForm').on('submit', function (e) {
    e.preventDefault();

    var cbVal = [];
    $('.valModule').each(function () {
        if (this.checked) {
            cbVal.push($(this).val());
        }
    });

    var rbVal = $('input:radio.valStatus:checked').val();
    var token = $('#tokenFilter').val();

    $('#submitFilter').prop("disabled", true);

    $.ajax({
        url: "/filter-form",
        type: "POST",
        data: {
            "_token": token,
            status: rbVal,
            module: cbVal,
        },
        success: function (response) {
            console.log(response['data']);
            // $('#resultFilter').remove();
            $('#resultFilter').fadeOut(500,function(){
                $(this).remove();
            });
            var len = response['data'].length;

            html = '<div class="table-responsive" id="resultFilter">';
            html += '<table id="" class="table table-bordered datatable">';
            html += `<thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Test Date</th>
                            <th>Training Hour</th>
                            <th>Error</th>
                            <th>Status</th>
                            <th>Reneweal Date</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Test Date</th>
                            <th>Training Hour</th>
                            <th>Error</th>
                            <th>Status</th>
                            <th>Reneweal Date</th>
                        </tr>
                    </tfoot>`;
            var allEmp = [];
            for (var i = 0; i < len; i++){
                allEmp.push(response['data'][i].employees.id_employees);
            }
            var uniqueEmp = allEmp.filter((item, i, ar) => ar.indexOf(item) === i);

            for (var a = 0; a < uniqueEmp.length; a++){
                var current_id = uniqueEmp[a];
                var count = 0;
                for (var i = 0; i < len; i++){
                    var id_emp = response['data'][i].employees.id_employees;
                    var first_name = response['data'][i].employees.first_name;
                    var last_name = response['data'][i].employees.last_name;
                    var test_date = response['data'][i].test_date;
                    var module_attended = response['data'][i].module_attended;
                    var training_hour = response['data'][i].training_hour;
                    var error = response['data'][i].error;
                    var status = response['data'][i].status;
                    var renewal_date = response['data'][i].renewal_date;

                    if (id_emp==current_id) {
                        if (count==0) {
                            html += '<tr>';
                            html += '<td><span class="text-white">'+(a+1)+'</span><i class="fa fa-times text-danger"></i></td>';
                            html += '<td colspan="6" class="font-weight-bold">'+first_name+' - '+last_name+'</td>';
                            html += '<td style="display: none;"></td>';
                            html += '<td style="display: none;"></td>';
                            html += '<td style="display: none;"></td>';
                            html += '<td style="display: none;"></td>';
                            html += '<td style="display: none;"></td>';
                            html += '</tr>';
                        }
                        html += '<tr><td class="text-white">'+(a+1)+'.'+(count+1)+'</td>';
                        html += '<td>'+module_attended+'</td>';
                        html += '<td>'+test_date+'</td>';
                        html += '<td>'+training_hour+'</td>';
                        html += '<td>'+error+'</td>';
                        html += '<td>'+status+'</td>';
                        html += '<td>'+renewal_date+'</td>';
                        html += '</tr>'

                        count++;

                    }
                }
            }
            html += '</table>';
            html += '</div>';
            $(html).hide().appendTo("#contentResult").fadeIn(1000);
            $('.datatable').DataTable();
            $('#submitFilter').prop("disabled", false);
        }
    });


})
