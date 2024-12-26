function toggleMenu() {
    const navLinks = document.querySelector('.nav_link');
    navLinks.classList.toggle('active');
}

const msgs = document.getElementById("msgs");
const uname = document.getElementById("uname");
const email = document.getElementById("email");
const age = document.getElementById("age");
const pwd = document.getElementById("pwd");
const cpwd = document.getElementById("cpwd");
const role = document.getElementById("role");
const mobile = document.getElementById("mobile");
const photo = document.getElementById("photo");
const form = document.querySelector(".signform");

form.addEventListener("submit",(e)=>{
    e.preventDefault();
    
    let valid = true;

    if (uname.value.trim() != "") {
        showSuccess(uname);
    } else {
        valid = false;
        showError(uname,"Name is required")
    }
    console.log(valid);
    if (age.value >= 18) {
        showSuccess(age);
    } else {
        valid = false;
        showError(age,"Not eligible");
        // window.location.href = "../index.php";
    }
    console.log(valid);
    if (email.value.trim() != "") {
        showSuccess(email);
    } else {
        valid = false;
        showError(email,"Enter a valid Email");
    }
    console.log(valid);
    if (role.value != "") {
        showSuccess(role);
    } else {
        valid = false;
        showError(role,"Select any role");
    }
    console.log(valid);
    // const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])$/;
    if (pwd.value.length >= 8) {
        showSuccess(pwd);
    } else {
        valid = false;
        showError(pwd,"password must contains atleast 8 characters");
    }
    console.log(valid);
    if(pwd.value !== cpwd.value){
        valid = false;
        alert("Passwords is not matching");
    }
    console.log(valid);
    if (mobile.value.length == 10) {
        showSuccess(mobile);
    } else {
        valid = false;
        showError(mobile,"Enter a valid mobile no");
    }

    console.log(valid);

    if (valid) {
        e.target.submit();
        alert("Form submited successfully");
    }

})

const showError = (input,msg) => {
    const temp = document.getElementById(`${input.id}`);
    temp.classList.add("showerror");
    temp.classList.remove("showsuccess");
    msgs.innerText = msg;
    setTimeout(() => {
        temp.classList.remove("showerror");
        msgs.innerText = "";
    }, 2000);
}

const showSuccess = (input) => {
    const temp = document.getElementById(`${input.id}`);
    temp.classList.add("showsuccess");
    temp.classList.remove("showerror");
}