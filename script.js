function changeView() {
    var signInBox = document.getElementById("signIn_Box");
    var signUpBox = document.getElementById("signUp_Box");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");
}

function signUp() {
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
    var mobile = document.getElementById("mobile").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    var form = new FormData();
    form.append("f", fname);
    form.append("l", lname);
    form.append("e", email);
    form.append("m", mobile);
    form.append("u", username);
    form.append("p", password);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var msgDiv1 = document.getElementById("msgDiv1");
            var msg1 = document.getElementById("msg1");

            if (request.status == 200) {
                var response = request.responseText;
                if (response.trim() === "success") {
                    msg1.innerHTML = "Registration Successful";
                    msg1.className = "alert alert-success";
                    msgDiv1.className = "d-block";

                    document.getElementById("signUpForm").reset();
                } else {
                    msg1.innerHTML = response;
                    msg1.className = "alert alert-danger";
                    msgDiv1.className = "d-block";
                }
            } else {
                msg1.innerHTML = "An error occurred during registration. Please try again.";
                msg1.className = "alert alert-danger";
                msgDiv1.className = "d-block";
            }
        }
    };

    request.open("POST", "signUpProcess.php", true);
    request.send(form);
}


function signIn() {
    var un = document.getElementById("un");
    var pw = document.getElementById("pw");
    var rm = document.getElementById("rm");

    var form = new FormData();
    form.append("u", un.value);
    form.append("p", pw.value);
    form.append("r", rm.checked);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "Success") {
                window.location = "index.php";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    }

    request.open("POST", "signInProcess.php", true);
    request.send(form);
}

function adminSignIn() {

    var un = document.getElementById("un");
    var pw = document.getElementById("pw");

    //alert(un.value);

    var f = new FormData();
    f.append("u", un.value);
    f.append("p", pw.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "Success") {
                window.location = "adminDashboard.php"
            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";
            }

        }
    };

    request.open("POST", "adminSignInProcess.php", true);
    request.send(f);
}

function loadUser() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            document.getElementById("tb").innerHTML = response;
            //location:reload();
        }
        
    };
    //reload();

    request.open("POST", "loadUserProcess.php", true);
    request.send();
}

function updateUserStatus() {
    var userid = document.getElementById("uid");
    //alert(userid.value);

    var f = new FormData();
    f.append("u", userid.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "Deactivate") {
                document.getElementById("msg").innerHTML = "User Deactivate Successfully";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";
                userid.value = "";
                loadUser();

            } else if (response == "Active") {
                document.getElementById("msg").innerHTML = "User Activate Successfully";
                document.getElementById("msg").className = "alert alert-success";
                docment.getElementById("msgDiv").className = "d-block";
                userid.value = "";
                loadUser();

            } else {
                document.getElementById("msg").innerHTML = response;
                docment.getElementById("msgDiv").className = "d-block";
            }
        }
    };
    request.open("POST", "updateUserStatusProcess.php", true);
    request.send(f);

}

function reload() {
    location.reload();
}

function brandReg() {

    var brand = document.getElementById("brand");
    //alert(brand.value);

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
    //alert(cat.value);

    var f = new FormData();
    f.append("c", cat.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);

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
    //alert(color.value);

    var f = new FormData();
    f.append("c", color.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);

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
    //alert(color.value);

    var f = new FormData();
    f.append("s", size.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);

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
    var gender = document.getElementById("gender");
    var desc = document.getElementById("desc");
    var file = document.getElementById("file");

    var form = new FormData();
    form.append("pname", pname.value);
    form.append("brand", brand.value);
    form.append("cat", cat.value);
    form.append("color", color.value);
    form.append("size", size.value);
    form.append("gender", gender.value);
    form.append("desc", desc.value);
    form.append("image", file.files[0]);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(response);
            Swal.fire({
                title: "Product Register Successfully !",
                response,
                icon: "success"
            });
            //location.reload();
            reload();
        }
    };


    request.open("POST", "productRegProcess.php", true);
    request.send(form);





}

function updateStock() {
    //alert("ok");

    var pname = document.getElementById("selectProduct");
    var qty = document.getElementById("qty");
    var uprice = document.getElementById("uprice");

    var form = new FormData();
    form.append("p", pname.value);
    form.append("q", qty.value);
    form.append("up", uprice.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(response);
            Swal.fire({
                title: "Update Stock Successfully !",
                response,
                icon: "success"
            });
            //location.reload();
            reload();
        }
    };

    request.open("POST", "updateStockProcess.php", true);
    request.send(form);
}








function printDiv() {
 
    var originalContent = document.body.innerHTML;
    var printArea = document.getElementById("printArea").innerHTML;

    document.body.innerHTML = printArea;

    window.print();

    document.body.innerHTML = originalContent;
}



function loadProduct(x) {

    var page = x;
    //alert(x);

    var f = new FormData();
    f.append("p", page);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            document.getElementById("pid").innerHTML = response;
        }
    };


    request.open("POST", "loadProductProcess.php", true);
    request.send(f);
}

function searchProduct(x) {

    var page = x;
    var product = document.getElementById("product");

    //alert(page);
    //alert(product.value);

    var f = new FormData();
    f.append("p", product.value);
    f.append("pg", page);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            document.getElementById("pid").innerHTML = response;
        }
    };

    request.open("POST", "searchProductProcess.php", true);
    request.send(f);
}

function advSearchProduct(x) {

    var page = x;
    var color = document.getElementById("color");
    var cat = document.getElementById("cat");
    var brand = document.getElementById("brand");
    var size = document.getElementById("size");
    var min = document.getElementById("min");
    var max = document.getElementById("max");

    var f = new FormData();
    f.append("pg", page);
    f.append("co", color.value);
    f.append("cat", cat.value);
    f.append("b", brand.value);
    f.append("s", size.value);
    f.append("min", min.value);
    f.append("max", max.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            document.getElementById("pid").innerHTML = response;
        }
    };

    request.open("POST", "advSearchProductProcess.php", true);
    request.send(f);
}


function uploadImg() {
    //alert("ok");

    var img = document.getElementById("imageUploader");

    var f = new FormData();
    f.append("i", img.files[0]);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "empty") {
                //alert("Please Select Your Profile Picture");
                Swal.fire("Please Select Your Profile Picture!");
            } else {
                document.getElementById("i").src = response;
                img.value = "";
            }
        }
    };

    request.open("POST", "profileImgUploadProcess.php", true);
    request.send(f);
}

function updateData() {
    //alert("ok");

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var password = document.getElementById("pw");
    var no = document.getElementById("no");
    var line1 = document.getElementById("l1");
    var line2 = document.getElementById("l2");
    //alert(fname.value);

    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("p", password.value);
    f.append("n", no.value);
    f.append("l1", line1.value);
    f.append("l2", line2.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            //reload();
            Swal.fire({
                title: "Data Updated SuccessFully!",
                response,
                icon: "success"

            });
            

        }
        //reload();
    };

    request.open("POST", "updateDataProcess.php", true);
    request.send(f);


}

function signOut() {
    //alert("ok");

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            Swal.fire({
                title: "Sign Out SuccessFully!",
                response,
                icon: "success"

            });

            //reload();


        }
    };

    request.open("POST", "signOutProcess.php", true);
    request.send();
}

function viewFilter() {
    // alert("filter");
    document.getElementById("filterId").className = "d-block";
}

function addtoCart(x) {
    var stockId = x;
    var qty = document.getElementById("qty");

    // Check if the qty input element exists and its value is valid
    if (!qty || isNaN(qty.value) || qty.value <= 0) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Please Enter a Valid Quantity!",
            footer: '<a href="#">Why do I have this issue?</a>'
        });
        return; // Exit the function if validation fails
    }

    var f = new FormData();
    f.append("s", stockId);
    f.append("q", qty.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            if (request.status == 200) {
                var response = request.responseText;
                Swal.fire({
                    title: "Item Added Successfully!",
                    text: response,
                    icon: "success"
                });
                qty.value = "";
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "An error occurred while adding the item to the cart.",
                    footer: '<a href="#">Why do I have this issue?</a>'
                });
            }
        }
    };

    request.open("POST", "addtoCartProcess.php", true);
    request.send(f);
}


function loadCart() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            document.getElementById("cartBody").innerHTML = response;

        }
    };


    request.open("POST", "loadCartProcess.php", true);
    request.send();

}

function incrementCartQty(x) {

    var cartId = x;
    var qty = document.getElementById("qty" + x);
    //alert(qty.value);
    var newQty = parseInt(qty.value) + 1;
    //alert(newQty);

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "Success") {
                qty.value = parseInt(qty.value) + 1;
                loadCart();
            } else {
                alert(response);
            }

        }
    };

    request.open("POST", "updateCartQtyProcess.php", true);
    request.send(f);

}

function decrementCartQty(x) {


    var cartId = x;
    var qty = document.getElementById("qty" + x);
    //alert(qty.value);
    var newQty = parseInt(qty.value) - 1;
    //alert(newQty);

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    if (newQty > 0) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                //alert(response);
                if (response == "Success") {
                    qty.value = parseInt(qty.value) - 1;
                    loadCart();
                } else {
                    alert(response);
                }


            }
        };

        request.open("POST", "updateCartQtyProcess.php", true);
        request.send(f);
    }

}

function removeCart(x) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: `warning`,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'

    }).then((result) => {
        if (result.isConfirmed) {
            var f = new FormData();
            f.append("c", x);

            var request = new XMLHttpRequest();
            request.onreadystatechange = function () {
                if (request.readyState == 4 & request.status == 200) {
                    var response = request.responseText;
                    Swal.fire({
                        title: response,
                        icon: "success"
                    });
                    reload();

                }
            };
            request.open("POST", "removeCartProcess.php", true);
            request.send(f);
        }
    });
}









function checkOut() {
    // alert("ok");

    var f = new FormData();
    f.append("cart", true);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            // alert(response);
            var payment = JSON.parse(response);
            doCheckout(payment, "checkoutProcess.php");
        }
    }

    request.open("POST", "paymentProcess.php", true);
    request.send(f);
}


function doCheckout(payment, path) {

    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer

        var f = new FormData();
        f.append("payment", JSON.stringify(payment));

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;
                // alert(response);
                var order = JSON.parse(response);

                if (order.resp == "Success") {
                    //reload();
                    window.location = "invoice.php?orderId=" + order.order_id;
                } else {
                    alert(response);
                }
            }
        }


        request.open("POST", path, true);
        request.send(f);
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    // document.getElementById('payhere-payment').onclick = function (e) {
    payhere.startPayment(payment);
    // };
}

function buyNow(stockId) {
    // alert(stockId);
    var qty = document.getElementById("qty");

    if (qty.value > 0) {

        var f = new FormData();
        f.append("cart", false);
        f.append("stockId", stockId);
        f.append("qty", qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;
                // alert(responce);
                var payment = JSON.parse(response);
                payment.id = stockId;
                payment.qty = qty.value;
                doCheckout(payment, "buynowProcess.php");
            }
        }

        request.open("POST", "paymentProcess.php", true);
        request.send(f);

    } else {
        alert("Please enter valid quantity");
    }
}

function forgetPassword() {
    var email = document.getElementById("e");

    if (email.value != "") {

        var f = new FormData();
        f.append("e", email.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                //alert(response);
                if (response == "Success") {
                    document.getElementById("msg").innerHTML = "Email sent! Please Check your mail box";
                    document.getElementById("msg").className = "alert alert-success";
                    document.getElementById("msgDiv").className = "d-block";
                    email.value = "";
                } else {
                    document.getElementById("msg").innerHTML = response;
                    document.getElementById("msg").className = "alert alert-danger";
                    document.getElementById("msgDiv").className = "d-block";
                }
            }
        };

        request.open("POST", "forgetPasswordProcess.php", true);
        request.send(f);





    } else {
        alert("Please enter your valid Email");
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
            //alert(response);
            if (response == "Success") {
                window.location = "signIn.php";
            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msg").className = "alert alert-danger";
                document.getElementById("msgDiv").className = "d-block";
            }

        }
    }

    request.open("POST", "resetPasswordProcess.php", true);
    request.send(f);



}


function loadChart() {

    var ctx = document.getElementById("myChart");

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);

            var data = JSON.parse(response);

            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: '# of Votes',
                        data: data.data,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });


        }
    }

    request.open("POST", "loadChartProcess.php", true);
    request.send();

}