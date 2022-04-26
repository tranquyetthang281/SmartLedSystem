// function changeLed(select) {
//     var ul = document.getElementById('listHistory');
//     for (var i = 0; i < dummyData.length; i++) {
//         var li = dummyData[i];

//         var d = li.date;
//         var datestring =
//             ('0' + d.getDate()).slice(-2) +
//             '-' +
//             ('0' + (d.getMonth() + 1)).slice(-2) +
//             '-' +
//             d.getFullYear() +
//             ' ' +
//             ('0' + d.getHours()).slice(-2) +
//             ':' +
//             ('0' + d.getMinutes()).slice(-2);

//         var y = document.createElement('li');
//         var t = document.createTextNode(datestring + ': ' + (li.status ? 'Turn On ' : 'Turn Off'));
//         y.appendChild(t);

//         var icon = document.createElement('i');
//         icon.setAttribute('class', 'material-icons icon-remove');
//         icon.onclick = function () {
//             $('#' + d.id).remove();
//         };
//         icon.appendChild(document.createTextNode('delete'));

//         y.appendChild(icon);
//         y.setAttribute('id', d.id);

//         ul.appendChild(y);
//     }
// }
var ledIdCurrent = -1;
function updateView(data) {
    html = '';
    if (data) {
        $.each(data, function (key, value) {
            html += "<li id='history" + value['id'] + "'>";
            html += value['time'];
            html += value['action'] == '1' ? ' Turn On' : ' Turn Off';
            html += '<i class="material-icons icon-remove" onclick="deleteHistory(this)">delete</i>';
        });
    }
    $('#listHistory').html(html);
}
function changeLed(selected) {
    ledId = selected.value.split('led')[1];
    ledIdCurrent = ledId;
    $.ajax({
        url: DOMAIN + 'History/getHistory',
        type: 'post',
        data: {
            ledId: ledId,
        },
        dataType: 'json',
        success: function (result) {
            if (result != 'Failed') {
                updateView(result);
            } else {
                console.log('failed');
            }
        },
    });
}
$('.icon-remove').click(function () {});

function deleteHistory(selected) {
    historyId = selected.parentNode.id.split('history')[1];
    $.ajax({
        url: DOMAIN + 'History/deleteHistory',
        type: 'post',
        data: {
            historyId: historyId,
        },
        dataType: 'json',
        success: function (result) {
            if (result != 'Failed') {
                updateView(result);
            } else {
                console.log('failed');
            }
        },
    });
}
function removeAll() {
    $.ajax({
        url: DOMAIN + 'History/deleteAll',
        type: 'post',
        data: {
            ledId: ledIdCurrent,
        },
        success: function (result) {
            if (result != 'Failed') {
                updateView(result);
            } else {
                console.log('failed');
            }
        },
    });
}
