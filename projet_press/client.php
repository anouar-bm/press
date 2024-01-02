<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="clien.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header>
        <h2 class="logo"><a href="home.css"><img src="logo transparent.png"></a></h2>
        <nav class="navigation">
            <button class="btnLogin-popup" onclick="window.location.href = 'home.html';">home</button>
          <button class="btnLogin-popup" onclick="window.location.href = 'index.html';">login</button>
          </nav>    
      </header>
    <div class="container my-5" style="padding-top: 120px;">

        <h2>Add New Client</h2>


        <br>
        <form method="post">
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="name">Name:</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" id="name" name="name" >
                    </div>
            </div>
            <div class="row mb-3 ">
                    <label class="col-form-label col-sm-1" for="email">Email:</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="email" id="email" name="email" >
                    </div>
            </div>
            <div class="row mb-3 ">
                    <label class="col-form-label col-sm-1" for="phone">Phone:</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" id="phone" name="phone">
                    </div>
            </div>
            <div class="row mb-3 ">
                    <label class="col-form-label col-sm-1" for="address">Address:</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" id="address" name="address">
                    </div>
            </div>


            <div class="row mb-3">
                    <div class="offset-sm-1 col-sm-3 d-grid">
                        <a class="btn btn-primary" onclick="add()">Add Client</a>
                    </div>
                 
            </div>
        </form>


        <table class="table" id="table">
            <thead>
             <tr>
                 <th>Name</th>
                 <th>Email</th>
                 <th>Phone</th>
                 <th>Address</th>
                 <th>Action</th>
             </tr>
             </thead>
  
        </table>
    </div>

    




<script >
function add(){

var userName1 = document.getElementById('name').value;
var usereamil1 = document.getElementById('email').value;
var userphone1 = document.getElementById('phone').value;
var useradress1= document.getElementById('address').value;
if(userName1.length == 0 || usereamil1.length == 0|| userphone1.length == 0 || useradress1.length == 0) alert("ne doit pas etre vide");


else{
        
        
                // la creation de la balise tr
                var tr = document.createElement('tr');

                var td1 = document.createElement('td');
                var td2 = document.createElement('td');
                var td3 = document.createElement('td');
                var td4 = document.createElement('td');
                var td5 = document.createElement('td');
                var x = document.createElement("BUTTON");
                var y = document.createElement("BUTTON");

                //ajouter la valeur username dans td1
                td1.append(userName1)
                td2.append(usereamil1)
                td3.append(userphone1)
                td4.append(useradress1)

                x.className ="btn btn-outline-success";
                y.className ="btn btn-outline-danger";

                x.textContent = 'modifier';
                y.textContent = 'suprimer';
               
                x.setAttribute("onclick", "modifier(this)");
                y.setAttribute("onclick", "supprimer(this)");

                td5.append(x)
                td5.append(y)
    
                tr.append(td1);
                tr.append(td2);
                tr.append(td3);
                tr.append(td4);
                tr.append(td5);

                //ajouter tr dans table1
                let table1 = document.getElementById('table');
                table1.append(tr)
                //vider les champs
                document.getElementById('name').value = ''
                document.getElementById('email').value = ''
                document.getElementById('phone').value = ''
                document.getElementById('address').value = ''
            

                     }
                }          
                
             function modifier(x) {
            let ligne = x.parentNode.parentNode;
            let newName = prompt("Enter the new name");
            let newEmail = prompt("Enter the new email");
            let newPhone = prompt("Enter the new phone");
            let newAddress = prompt("Enter the new address");

            if (newName && newEmail && newPhone && newAddress) {
                ligne.cells[0].textContent   = newName;
                ligne.cells[1].textContent   = newEmail;
                ligne.cells[2].textContent   = newPhone;
                ligne.cells[3].textContent   = newAddress;
            }
        }
                function supprimer(x){
                    let ligne = x.parentNode.parentNode;
                    ligne.remove();

                }



</script>
</body>
</html>