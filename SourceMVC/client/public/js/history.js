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
function changeLed(selected) {
    ledId = selected.value.split('led')[1];
    $.ajax({
        url: DOMAIN + 'History/getHistory',
        type: 'post',
        data: {
            ledId: ledId,
        },
        success: function (result) {
            console.log(result);
            if (result != 'Failed') {
                html = '';
                html += "<li id='history:" + result['id'] + "'>";
                html += result['time'];
                html += result['action'] == '1' ? 'Turn On' : 'Turn Off';
                html += '<i class="material-icons icon-remove">delete</i>';
            } else {
                console.log('failed');
            }
        },
    });
}

function removeAll() {
    $('#listHistory').empty();
}
