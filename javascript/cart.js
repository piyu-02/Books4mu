
function changeQty(id) {
   
    const qty = document.getElementById('qty' + id).value;
    window.location.href= './updatecart.php?id=' + id + '&quantity=' + qty;
}
