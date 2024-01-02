
const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');

registerLink.addEventListener('click', ()=> {
  wrapper.classList.add('active');
});

loginLink.addEventListener('click', ()=> {
  wrapper.classList.remove('active');
});

//btnPopup.addEventListener('click', ()=> {
  wrapper.classList.add('active-popup');
//});

/*iconClose.addEventListener('click', ()=> {
  wrapper.classList.remove('active-popup');
});*/


function afficher_password(){
  let passwordInput = document.getElementById('in2');
  if (passwordInput.type === 'text') {
    passwordInput.type = 'password';
  } else if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
  }
}
function afficher_password_regsiter() {
  const passwordInputs = document.getElementsByClassName('MotDePassereg');

  for (let i = 0; i < passwordInputs.length; i++) {
    if (passwordInputs[i].type === 'text') {
      passwordInputs[i].type = 'password';
    } else if (passwordInputs[i].type === 'password') {
      passwordInputs[i].type = 'text';
    }
  }
}
// function signup() {
  
//   var userfullNameIn1 = document.getElementById('reg1').value;
//   var usermailIn2 = document.getElementById('reg2').value;
//   var passwordReg3 = document.getElementById('reg3').value;
//   var passwordReg4 = document.getElementById('reg4').value;

//   for (var i = 0; i < users.length; i++) {
//     if (users[i].email === usermailIn2 || users[i].username === userfullNameIn1) {
//       document.getElementById('s2').innerHTML = "Email or username already registered.";
//       return false; // Empêche la soumission du formulaire en cas d'erreur
//     }
//   }

//   if (userfullNameIn1.length >= 2 && usermailIn2.length >= 2) {
//     var User_name = userfullNameIn1.substring(0, 2) + usermailIn2.substring(0, 2);
//   } else {
//     document.getElementById('s2').innerHTML = "Please enter valid name and email.";
//     return false; // Empêche la soumission du formulaire en cas d'erreur
//   }

//   if (passwordReg3 === '' || passwordReg4 === '') {
//     document.getElementById('s2').innerHTML = "Please enter password in both fields.";
//     return false; // Empêche la soumission du formulaire en cas d'erreur
//   }

//   if (passwordReg3.length < 8) {
//     document.getElementById('s2').innerHTML = "Password must contain at least 8 characters.";
//     return false; // Empêche la soumission du formulaire en cas d'erreur
//   }

//   if (passwordReg3 !== passwordReg4) {
//     document.getElementById('s2').innerHTML = "The two passwords are different.";
//     return false; // Empêche la soumission du formulaire en cas d'erreur
//   }

//   var user = {
//     nomc: userfullNameIn1,
//     email: usermailIn2,
//     username: User_name,
//     password: passwordReg3
//   };

//   users.push(user);
//   console.log(users);
//   document.getElementById('s2').innerHTML = "Inscription réussie.";
//   return true; // Autorise la soumission du formulaire si toutes les vérifications passent
// }

// function login(){
// var userNameIn1 = document.getElementById('in1').value;
// var passwordIn2 = document.getElementById('in2').value;
// if(userNameIn1==''){
// document.getElementById('s1').innerHTML = "username must be filled out";
//     return false;
// }else if(passwordIn2==''){
// document.getElementById('s1').innerHTML = "password must be filled out";
//     return false;
// }
// for(var i=0;i<users.length;i++){
// if((userNameIn1===users[i].username || userNameIn1===users[i].email)  && passwordIn2===users[i].password){   
//             return true;
//         }
// }
// document.getElementById('s1').innerHTML = "password and username do not match";
// return false;
// }
