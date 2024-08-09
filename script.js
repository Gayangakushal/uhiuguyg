function changeView() {
    var signInBox = document.getElementById("signInBox");
    var signUpBox = document.getElementById("signUpBox");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");
}

function signUp() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    // alert(fname.value);

    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("u", username.value);
    f.append("p", password.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("msg1").innerHTML = "Registration Successfully";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";

                fname.value = "";
                lname.value = "";
                email.value = "";
                mobile.value = "";
                username.value = "";
                password.value = "";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
            }

        }
    };

    request.open("POST", "signUpProcess.php", true);
    request.send(f);

}

function signIn() {
    var un = document.getElementById("un");
    var pw = document.getElementById("pw");
    var rm = document.getElementById("rm");

    var f = new FormData();
    f.append("u", un.value);
    f.append("p", pw.value);
    f.append("r", rm.checked);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            if (response == "Success") {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Signed in successfully"
                }).then(() => {
                    window.location = "loading.php";
                });
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    };

    request.open("POST", "signInProcess.php", true);
    request.send(f);
}

function forgetPassword() {
    var loader = document.getElementById("loader")
    var btnText = document.getElementById("btnText")
    var email = document.getElementById("e");

    loader.classList.remove("d-none");
    btnText.classList.add("d-none");

    if (email.value != "") {
        
        var f = new FormData();
        f.append("e", email.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                loader.classList.add("d-none");
                btnText.classList.remove("d-none")
                var response = request.responseText;
                // alert(response);
                if (response == "Success") {
                    document.getElementById("msg").innerHTML = "Check your email to reset password";
                    document.getElementById("msg").className = "alert alert-success";
                    document.getElementById("msgDiv").className = "d-block";
                } else {
                    document.getElementById("msg").innerHTML = response;
                    document.getElementById("msg").className = "alert alert-danger";
                    document.getElementById("msgDiv").className = "d-block";
                }
            }
        };

        request.open("POST", "forgetPasswordProcess.php", true);
        request.send(f);

    }else{
        alert("Please enter your email");
    }  
}

function resetPassword() {
    var vcode = document.getElementById("vcode");
    var np = document.getElementById("np");
    var np2 = document.getElementById("np2");
   
    var f = new FormData();
    f.append("vcode", vcode.value);
    f.append("np", np.value);
    f.append("np2", np2.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                window.location = "signIn.php";
            } else {
              document.getElementById("msg").innerHTML = response;
              document.getElementById("msg").className = "alert alert-danger";
              document.getElementById("msgDiv").className = "d-block";


            }
        }
        
    };

    request.open("POST", "resetPasswordProcess.php", true);
    request.send(f);
}
function uploadImg(){
    // alert("Upload Image");

 var img = document.getElementById("imgUploader");

 var f = new FormData();
 f.append("i", img.files[0]);

 var request = new XMLHttpRequest();
 request.onreadystatechange = function (){
     if(request.readyState == 4 & request.status == 200){
         var response = request.responseText;
        //  alert(response);
        if (response == "empty") {
            alert("Please select Your Profile Image");
            
        } else {
            document.getElementById("i").src = response;
            img.value = "";
            
        }
     }
 };
 request.open("POST", "profileImgUpload.php", true);
 request.send(f);

}
function updateData() {
    // alert("Update Data");
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var pw = document.getElementById("pw");
    var no = document.getElementById("no");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    // alert(fname.value);
    // alert(lname.value);

    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("p", pw.value);
    f.append("n", no.value);
    f.append("l1", line1.value);
    f.append("l2", line2.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            showAlert("Success", response, "success");
            reload();
        }
    };
    request.open("POST", "updateDataProcess.php", true);
    request.send(f);
}

function showAlert(title, text, icon) {
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        confirmButtonText: 'OK'
    });
}


function signOut(){
    var request = new XMLHttpRequest();
    request.onreadystatechange = function (){
        if(request.readyState == 4 && request.status == 200){ // Use '&&' instead of '&'
            var response = request.responseText;
            alert(response);
            location.reload(); // Corrected reload function
        }
    };
    request.open("POST", "signOutProcess.php", true);
    request.send();
}
function basicearch(x) {
    var txt = document.getElementById("basic_search_txt");
    var select = document.getElementById("basic_search_select");

    var f = new FormData();
    f.append("t", txt.value);
    f.append("s", select.value);
    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("basicSearchResult").innerHTML = t;
        }
    }

    r.open("POST", "basicSearchProcess.php", true);
    r.send(f);

}


function loadProduct(x){

    var page = x;
    // alert(x);

    var f = new FormData();
    f.append("p", page);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function (){
        if(request.readyState == 4 & request.status == 200){
            var response = request.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;
          
        }
    };


    request.open("POST", "loadProductProcess.php", true);
    request.send(f);

}
function searchProduct(x){


    var page = x;

    var product = document.getElementById("product");

    // alert(page);
    // alert(product.value);

    var f = new FormData();
    f.append("p", product.value);
    f.append("pg", page);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function (){
        if(request.readyState == 4 & request.status == 200){
            var response = request.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;
        }
    };
    request.open("POST", "searchProductProcess.php", true);
    request.send(f);
}

function viewFilter(){
    // alert("Filter");

    document.getElementById("filterId").className ="d-block";

}
function adminSignIn() {

    var un = document.getElementById("un");
    var pw = document.getElementById("pw");

    // alert(un.value);

    var f = new FormData();
    f.append("u", un.value);
    f.append("p", pw.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                window.location = "adminpanel.php";
            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";
            }
        }
    };

    request.open("POST", "adminSignInProcess.php", true);
    request.send(f);
}

function advSearchProduct(x){

    var page = x;
   var color =  document.getElementById("color");
  var cat =   document.getElementById("cat");
 var brand =    document.getElementById("brand");
 var size =   document.getElementById("size");
 var min =   document.getElementById("min");
  var max =  document.getElementById("max");
    // alert(cat.value);

    var f = new FormData();
    f.append("pg", page);
    f.append("co", color.value);
    f.append("cat", cat.value);
    f.append("b", brand.value);
    f.append("s", size.value);
    f.append("min", min.value);
    f.append("max", max.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function (){
        if(request.readyState == 4 & request.status == 200){
            var response = request.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;
          
        }
    };
    request.open("POST", "advanceSearchProductProcess.php", true);
    request.send(f);
   
}


    function adminVerification(){
        var email = document.getElementById("e");
    
        var f = new FormData();
        f.append("e",email.value);
    
        var r = new XMLHttpRequest();
    
        r.onreadystatechange = function (){
            if(r.readyState == 4){
                var t = r.responseText;
                if(t == "Success"){
                    var adminVerificationModal = document.getElementById("verificationModal");
                    av = new bootstrap.Modal(adminVerificationModal);
                    av.show();
                }else{
                    alert(t);
                }
            }
        }
    
        r.open("POST","adminVerificationProcess.php",true);
        r.send(f);
    }
    function verify(){
        var verification = document.getElementById("vcode");
    
        var r = new XMLHttpRequest();
    
        r.onreadystatechange = function (){
            if(r.readyState == 4){
                var t = r.responseText;
                if(t == "success"){
                    av.hide();
                    window.location = "adminPanel.php";
                }else{
                    alert (t);
                }
                
            }
        }
    
        r.open("GET","verificationProcess.php?v="+verification.value,true);
        r.send();
    }
    var mm;
function viewMsgModal(email){
    var m = document.getElementById("userMsgModal"+email);
    mm =new bootstrap.Modal(m);
    mm.show();
}

// loaduser //

function loadUser() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("tb").innerHTML = response;
        }
    };

    request.open("POST", "loadUserProcess.php", true);
    request.send();

}
function updateUserStatus() {
    var userid = document.getElementById("uid");
    //    alert(userid.value);

    var f = new FormData();
    f.append("u", userid.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Deactive") {
                document.getElementById("msg").innerHTML = "User Deactivate Successfully";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";
                userid.value = "";
                loadUser();

            } else if (response == "Active") {
                document.getElementById("msg").innerHTML = "User Activate Successfully";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";
                userid.value = "";
                loadUser();

            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";
            }
        }
    };

    request.open("POST", "updateUserStatusProcess.php", true);
    request.send(f);

}

function reload() {
    location.reload();
}

// show password//

document.getElementById('showPassword').addEventListener('change', function () {
    var passwordField = document.getElementById('pw');
    var eyeIcon = document.getElementById('eyeIcon');
    if (this.checked) {
        passwordField.type = 'text';
        eyeIcon.classList.remove('bi-eye');
        eyeIcon.classList.add('bi-eye-slash');
    } else {
        passwordField.type = 'password';
        eyeIcon.classList.remove('bi-eye-slash');
        eyeIcon.classList.add('bi-eye');
    }
});

// barn reg
function brandReg() {
    var brand = document.getElementById("brand");
    // alert(brand.value);

    var f = new FormData();
    f.append("b", brand.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("msg1").innerHTML = "Brand Registration Successfully";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";
                brand.value = "";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
            }
        }
    };

    request.open("POST", "brandRegisterProcess.php", true);
    request.send(f);

}
function categoryReg() {
    var cat = document.getElementById("cat");
    // alert(cat.value);

    var f = new FormData();
    f.append("c", cat.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("msg2").innerHTML = "Category Registration Successfully";
                document.getElementById("msg2").className = "alert alert-success";
                document.getElementById("msgDiv2").className = "d-block";
                cat.value = "";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    };

    request.open("POST", "categoryRegisterProcess.php", true);
    request.send(f);
}

function colorReg() {
    var color = document.getElementById("color");
    // alert(color.value);

    var f = new FormData();
    f.append("c", color.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("msg3").innerHTML = "Color Registration Successfully";
                document.getElementById("msg3").className = "alert alert-success";
                document.getElementById("msgDiv3").className = "d-block";
                color.value = "";
            } else {
                document.getElementById("msg3").innerHTML = response;
                document.getElementById("msgDiv3").className = "d-block";
            }
        }
    };

    request.open("POST", "colorRegisterProcess.php", true);
    request.send(f);
}

function sizeReg() {
    var size = document.getElementById("size");
    // alert(size.value);

    var f = new FormData();
    f.append("s", size.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("msg4").innerHTML = "Size Registration Successfully";
                document.getElementById("msg4").className = "alert alert-success";
                document.getElementById("msgDiv4").className = "d-block";
                size.value = "";
            } else {
                document.getElementById("msg4").innerHTML = response;
                document.getElementById("msgDiv4").className = "d-block";
            }
        }
    };

    request.open("POST", "sizeRegisterProcess.php", true);
    request.send(f);

}

function regProduct() {

    var pname = document.getElementById("pname");
    var brand = document.getElementById("brand");
    var cat = document.getElementById("cat");
    var color = document.getElementById("color");
    var size = document.getElementById("size");
    var desc = document.getElementById("desc");
    var file = document.getElementById("file");

    // alert(pname.value);
    // alert(brand.value);
    // alert(cat.value);
    // alert(color.value);
    // alert(size.value);
    // alert(desc.value);
    // alert(file.value);

    var F = new FormData(); 

     var form = new FormData();
    form.append("pname", pname.value);
    form.append("brand", brand.value);
    form.append("cat", cat.value);
    form.append("color", color.value);
    form.append("size", size.value);
    form.append("desc", desc.value);
    form.append("image", file.files[0]);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        
        if(req.readyState == 4 && req.status == 200){
            var resp = req.responseText;
            alert(resp);
            location.reload(); 
            // location.href = 'productRegProcess.php'; 
        }
      
    };
    req.open("POST", "productRegProcess.php", true);
    req.send(form);

    }

    function updateStock() {

        var pname = document.getElementById("selectProduct");
        var qty = document.getElementById("qty");
        var price = document.getElementById("uprice");
        // alert(pname.value);

        var f = new FormData();
        f.append("p", pname.value);
        f.append("q", qty.value);
        f.append("up", price.value);

        var request = new XMLHttpRequest();


        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                alert(response);
                location.reload();
            }
        };
        
        request.open("POST", "updateStockProcess.php", true);
        request.send(f);

    }
    
    function printDiv() {
        var originalContent = document.body.innerHTML;
        var printArea = document.getElementById("printArea").innerHTML;
        document.body.innerHTML = printArea;
        window.print();
        document.body.innerHTML = originalContent;

    
     
    }

    
    function viewFilter(){
        // alert("Filter");
    
        document.getElementById("filterId").className ="d-block";
    
    }
    
    function addToWatchlist(id) {

        var r = new XMLHttpRequest();
    
        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                var t = r.responseText;
                if (t == "added") {
                    document.getElementById("heart" + id).style.className = "text-danger";
                    window.location.reload();
                } else if (t == "removed") {
                    document.getElementById("heart" + id).style.className = "text-dark";
                    window.location.reload();
                } else {
                    alert(t);
                }
            }
        }
    
        r.open("GET", "addToWatchlistProcess.php?id=" + id, true);
        r.send();
    
    }
    
    function removeFromWatchlist(id){
        var r = new XMLHttpRequest();
    
        r.onreadystatechange = function (){
            if(r.readyState == 4){
                var t = r.responseText;
                if(t == "success"){
                    window.location.reload();
                }else{
                    alert (t);
                }
                
            }
        }
    
        r.open("GET","removeWatchlistProcess.php?id="+id,true);
        r.send();
    }
    
    function searchProduct(x){


        var page = x;
    
        var product = document.getElementById("product");
    
        // alert(page);
        // alert(product.value);
    
        var f = new FormData();
        f.append("p", product.value);
        f.append("pg", page);
    
        var request = new XMLHttpRequest();
        request.onreadystatechange = function (){
            if(request.readyState == 4 & request.status == 200){
                var response = request.responseText;
                // alert(response);
                document.getElementById("pid").innerHTML = response;
            }
        };
        request.open("POST", "searchProductProcess.php", true);
        request.send(f);
    }
    

    function basicSearch(x) {
        
        let search_txt = document.getElementById("search_text").value;
        let cat_id = x;

        var f = new FormData();
        f.append("search_text", search_txt);
        f.append("cat_id", cat_id);
    
        var r = new XMLHttpRequest();
    
        r.onreadystatechange = function (){
            if(r.readyState == 4 & r.status == 200){
                var response = r.responseText;
                document.getElementById("basicSearchResult").innerHTML = response;
            }
        }
    
        r.open("POST", "basicSearchProcess.php", true);
        r.send(f);
    
    }
    function addToCart(id){
        var r =new XMLHttpRequest();
    
        r.onreadystatechange = function (){
            if(r.readyState == 4){
                var t = r.responseText;
                alert (t);
            }
        } 
    
        r.open("GET","addToCartProcess.php?id="+id,true);
        r.send();
    }
    

    