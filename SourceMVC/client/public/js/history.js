
var numLeds = 30;
var dummyData = [
  {
    id: 1,
    date: new Date(),
    status: true 
  },
  {
    id: 2,
    date: new Date(),
    status: false
  }
];
$(document).ready(function(){
    var option = '<option value="led">Thiết bị đèn số 1</option>';
    for (var i=2;i <= numLeds;i++){ 
        option += '<option value="'+ i + '">' + "<p>Thiết bị đèn số "+ i + '</p></option>';
    }
    $('#led').append(option);
  });
function changeLed(select)
{
  var ul = document.getElementById('listHistory');
  for (var i=0;i<dummyData.length;i++)
  {
    var li = dummyData[i];

    var d = li.date;
    var datestring = ("0" + d.getDate()).slice(-2) + "-" + ("0"+(d.getMonth()+1)).slice(-2) + "-" +
    d.getFullYear() + " " + ("0" + d.getHours()).slice(-2) + ":" + ("0" + d.getMinutes()).slice(-2);

    var y = document.createElement('li');
    var t = document.createTextNode(datestring+': '+(li.status?"Turn On ":"Turn Off"));
    y.appendChild(t);

    var icon = document.createElement('i');
    icon.setAttribute('class', "material-icons icon-remove");
    icon.onclick = function(){
      $('#'+d.id).remove();
    }
    icon.appendChild(document.createTextNode("delete"));    
    
    y.appendChild(icon);
    y.setAttribute('id',d.id);

    ul.appendChild(y);
    
  }
}
function removeAll()
{
  $('#listHistory').empty();
}