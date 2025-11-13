// const form = document.getElementById("addcategory");
// const category = document.getElementById("newcategory");
// const msg = document.getElementById("addcategorymsg");
// form.addEventListener("submit", function (e) {
//   if (blankvalidation() === true && valuevalidation() === true) {
//   } else {
//     e.preventDefault();
//   }
// });
// function blankvalidation() {
//   let flag = true;
//   if (category.value.trim() === "" || category.value === null) {
//     flag = false;
//     msg.classList.remove("d-none");
//   } else {
//     msg.classList.add("d-none");
//   }
//   return flag;
// }
// function valuevalidation() {
//   let temp = true;
//   if (category.value.match(/^[A-Za-z\s]+$/) == null) {
//     temp = false;
//     msg.classList.remove("d-none");
//     msg.innerText = "Give proper value";
//   } else {
//     msg.classList.add("d-none");
//   }
//   return temp;
// }

function showUpdate(id) {
const editRowcategory=document.getElementById("editRowcategory" + id)
editRowcategory.classList.add("d-none");
 const editcategoryForm=document.getElementById("editcategoryForm" + id)
//  alert ("editcategoryForm"+id);
 editcategoryForm.classList.remove("d-none");
}

function cancelEdit(id) {
  const editRowcategory=document.getElementById("editRowcategory" + id)
  editRowcategory.classList.remove("d-none");
  const editcategoryForm=document.getElementById("editcategoryForm" + id)
  editcategoryForm.classList.add("d-none");
}
function blankvalid(id) {
  var catname = document.getElementById("cat_name" + id);
  var msgcat=document.getElementById("editcatmsg"+ id);
  if (catname.value == "") {
	  msgcat.classList.remove("d-none");
   // alert("please enter value");
    return false;
  } else {
    return true;
  }
}
