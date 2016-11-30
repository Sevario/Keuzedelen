function changec() {
    var xDiv = document.getElementById('keuzedeel');

    if (xDiv.style.height == '',
        xDiv.style.width == '')
        xDiv.style.height = '400px',
        xDiv.style.width = '400px';
    else
        xDiv.style.height = '',
        xDiv.style.width = '';
}